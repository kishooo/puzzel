<?php

namespace App\Http\Controllers;
use Response;
use Illuminate\Http\Request;
use App\Models\test;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Middleware;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



class UfidaController extends Controller
{
  public function login(){
    return view('userInterface.Login');
  }

  public function doLogin(Request $request){
    $request->validate([
      'email' => 'required', // make sure the email is an actual email
      'Password' => 'required']);
    $userdata = array(
      'email' => $request->Input('email') ,
      'password' => $request->  get('password')
    );

    if (Auth::attempt(['email' => $request->input('email'), 'password' =>$request->input('Password')]))
      {
        $userId = Auth::user()->id;
        $user =DB::select("SELECT * FROM users WHERE id = ".$userId);
        $userType = $user[0]->UserType;

      return redirect("/HomePage/".$userId);

      // validation successful

      // do whatever you want on success
      }
      else
      {
      return redirect("admin/online/psadasdroducts/".$userId);
      }
  }
  public function create($userId)
  {

    return view("create",['user'=>$userId]);
  }
  public function insert(Request $request,$userId){

    $request->validate([
            'name' => 'required',
            //'type' => 'required|integer|min:0|max:2021',
            'category'=>'required',
            'price' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
    ]);

    $newImageName = time().'-'.$request->name . '.'.$request->image->extension();
    $request->image->move(public_path('images'), $newImageName);
    $getUser =DB::select('SELECT * FROM users WHERE id = '.$userId);

  //  $category= DB::select('SELECT * FROM categories WHERE title = '.$request->input('category'));
    $category=DB::table('categories')
              ->select('*')
              ->where('title',$request->input('category'))
              ->first();

    //$test = mysql_query($category);
    //DB::insert('insert into products (title,price,newPrice,image) values (?,?,?,?)', [$request->input('name'),$request->input('price'),$request->input('newPrice'),$newImageName]);
    if(is_null($category)){
      DB::insert('INSERT into categories (title) values(?)',[$request->input('category')]);
      $getCategory = DB::select("SELECT * FROM categories ORDER BY id DESC LIMIT 1");
      $getIndexCategory=$getCategory[0]->id;
    }else{

      $getCategory=DB::table('categories')
                ->select('*')
                ->where('title',$request->input('category'))
                ->get();
      $getIndexCategory=$getCategory[0]->id;
    }



    if(!empty($request->input('newPrice'))){
      DB::insert('insert into products (title,price,newPrice,image) values (?,?,?,?)', [$request->input('name'),$request->input('price'),$request->input('newPrice'),$newImageName]);

      }else{
          DB::insert('insert into products (title,price,image) values (?,?,?)', [$request->input('name'),$request->input('price'),$newImageName]);
      }
      $getProduct = DB::select("SELECT * FROM products ORDER BY id DESC LIMIT 1");
      $getIndexProduct = $getProduct[0]->id;
      DB::insert('insert into product_categories (productId,categoryId) values(?,?)',[$getIndexProduct,$getIndexCategory]);
      return redirect("/online/products/".$userId);
    }

    public function HomePage($userId){
      $getProduct = DB::select("SELECT * FROM products WHERE appeared=1 ORDER BY id DESC LIMIT 4");
      $userReview = DB::select("SELECT * FROM users  JOIN product_review on(users.id=product_review.userId) WHERE published= 1 ORDER BY product_review.id DESC LIMIT 3");
      $productCategory=DB::select("SELECT * , products.title  AS productTitle, categories.id As categoriesId  FROM products JOIN product_categories on(products.id=product_categories.productId) JOIN categories on(product_categories.categoryId=categories.id) GROUP BY(categories.title) ORDER BY categories.id DESC LIMIT 3");
      $productWithCategory=DB::select("SELECT * , products.title  AS productTitle , categories.id As categoriesId FROM products JOIN product_categories on(products.id=product_categories.productId) JOIN categories on(product_categories.categoryId=categories.id)");
      //$userName = DB::select('SELECT * FROM users WHERE id = '.$userId);

      if(!is_string($userId)){
        $getLast = DB::select('SELECT * FROM carts WHERE userId = '.$userId.' ORDER BY id DESC LIMIT 1');
        if(is_null($getLast) || empty($getLast)){
          DB::insert('insert into carts (userId) values (?)', [$userId]);
        }else{
          $getLast = DB::select('SELECT * FROM carts WHERE userId = '.$userId.' ORDER BY id DESC LIMIT 1');
          $cartId = $getLast[0]->id;
          $isDone = $getLast[0]->updatable;
          if($isDone==0){
            DB::insert('insert into carts (userId) values (?)', [$userId]);
          }
        }
      }

      return view('userInterface.Home',[
        'products'=>$getProduct,
        'reviews'=>$userReview,
        'categories'=>$productCategory,
      ]);
    }
    public function productPage($categoryId){
      $productWithCategory=DB::select("SELECT * , products.title  AS productTitle, products.id  AS productId , categories.id As categoriesId FROM products JOIN product_categories on(products.id=product_categories.productId) JOIN categories on(product_categories.categoryId=categories.id) WHERE categories.id = ".$categoryId);
      $categories=DB::select("SELECT * From categories");
      return view('userInterface.Lamsa',['products'=>$productWithCategory]);
    }

  public function ShowEditProduct(Request $request, $productId,$userId)
    {
        $products = DB::select('SELECT * FROM products WHERE id='.$productId);
        //$editProduct =DB::update('update into products(title,price,newPrice,image) values(?,?,?,?) Where Id = '.$productId,[$request->input('name'),$request->input('price'),$request->input('newPrice'),$newImageName])
        $getUser =DB::select('SELECT * FROM users WHERE id = 1');
        return view('editProduct',[
          'product'=>$products[0],
          'user'=>$getUser[0],
        ]);
    }


    public function EditProduct(Request $request, $productId,$userId)
      {
          $newImageName = time().'-'.$request->name . '.'.$request->image->extension();
          $request->image->move(public_path('images'), $newImageName);

          $getUser =DB::select('SELECT * FROM users WHERE id = '.$userId);
          $products = DB::select('SELECT * FROM products WHERE id='.$productId);
          //$editProduct =DB::update('UPDATE products SET title,price,newPrice,image  values(?,?,?,?) Where id = '.$productId,[$request->input('name'),$request->input('price'),$request->input('newPrice'),$newImageName]);
          //$editProduct =DB::update('UPDATE products SET title='.''.$request->input('name').''.',price='.$request->input('price').',newPrice='.$request->input('newPrice').',image= '.$newImageName.' Where id = '.$productId);
          DB::table('products')
            ->where('id',$productId)
            ->update(['title' => $request->input('name'),'price' =>$request->input('price'),'newPrice'=>$request->input('newPrice'),'image'=>$newImageName]);
          $tasks_controller = new UfidaController;

          //return $tasks_controller->index($userId);
          return redirect("/admin/online/products/".$userId);
      }

  public function home(){
    return view("home");
  }
  public function index($userId)
    {
        $productCategory=DB::select("SELECT * , products.title  AS productTitle, categories.id As categoriesId  FROM products JOIN product_categories on(products.id=product_categories.productId) JOIN categories on(product_categories.categoryId=categories.id) GROUP BY(categories.title)");
        $productWithCategory=DB::select("SELECT * , products.title  AS productTitle , categories.id As categoriesId FROM products JOIN product_categories on(products.id=product_categories.productId) JOIN categories on(product_categories.categoryId=categories.id)");
        $userName = DB::select('SELECT * FROM users WHERE id = '.$userId);
        $products = DB::select('SELECT * FROM products');
        $getLast = DB::select('SELECT * FROM carts WHERE userId = '.$userId.' ORDER BY id DESC LIMIT 1');

        if(is_null($getLast)|| empty($getLast)){
          DB::insert('insert into carts (userId) values (?)', [$userId]);
        }else{
          $getLast = DB::select('SELECT * FROM carts WHERE userId = '.$userId.' ORDER BY id DESC LIMIT 1');
          $cartId = $getLast[0]->id;
          $isDone = $getLast[0]->updatable;
          if($isDone==0){
            DB::insert('insert into carts (userId) values (?)', [$userId]);
          }
        }
        $categories = DB::select('SELECT * FROM categories');
        view("userInterface.header",["categories"=>$categories]);

        return view('products', [
          'cars'=>$products,
          'users'=>$userName,
          'productCategories'=>$productCategory,
          'productWithCategories'=>$productWithCategory,
        ]);
        return view('products');
    }
  public function addcartToUser(Request $request, $productId,$userId){
      $userName = DB::select('SELECT * FROM users WHERE id = '.$userId);
      //DB::insert('insert into carts (userId,name) values (?,?)', [$userId,$userName[0]->name]);
      $getLast = DB::select('SELECT * FROM carts WHERE userId = '.$userId.' ORDER BY id DESC LIMIT 1');
      $cartId = $getLast[0]->id;

      DB::table('carts')
        ->where('id',$cartId)
        ->update(['name'=>$userName[0]->name]);


      $cartId = DB::select('SELECT * FROM carts WHERE userId = '.$userId.' ORDER BY id DESC LIMIT 1');
      $products=DB::select('SELECT * FROM products WHERE id = '.$productId);
      $tasks_controller = new UfidaController;

      //foreach ($cartId as $cartId) {
        // code...
      DB::insert('insert into cart_Item (productId,title,price,cartId,quantity) values (?,?,?,?,?)', [$productId,$products[0]->title,$products[0]->price,$cartId[0]->id,1]);
      $categories = DB::select('SELECT * FROM categories');

      return redirect("/online/products/".$userId);
      //
  }
  public function addcartToUserHomePage(Request $request, $productId,$userId){
      $userName = DB::select('SELECT * FROM users WHERE id = '.$userId);
      //DB::insert('insert into carts (userId,name) values (?,?)', [$userId,$userName[0]->name]);
      $getLast = DB::select('SELECT * FROM carts WHERE userId = '.$userId.' ORDER BY id DESC LIMIT 1');
      $cartId = $getLast[0]->id;

      DB::table('carts')
        ->where('id',$cartId)
        ->update(['name'=>$userName[0]->name]);


      $cartId = DB::select('SELECT * FROM carts WHERE userId = '.$userId.' ORDER BY id DESC LIMIT 1');
      $products=DB::select('SELECT * FROM products WHERE id = '.$productId);
      $tasks_controller = new UfidaController;

      //foreach ($cartId as $cartId) {
        // code...
      //DB::insert('insert into cart_Item (productId,title,price,cartId,quantity) values (?,?,?,?,?)', [$productId,$products[0]->title,$products[0]->price,$cartId[0]->id,1]);
      $checkNull=DB::table('cart_item')
                ->select('*')
                ->where('cartId','=',$cartId[0]->id)
                ->where('productId','=',$productId)
                ->first();

      if(is_null($checkNull)){
        $checkproductPrice=DB::table('products')
                  ->select('*')
                  ->where('id',$productId)
                  ->having('newPrice','>','0')
                  ->first();
        if(is_null($checkproductPrice)){
            DB::insert('insert into cart_Item (productId,title,price,cartId,quantity) values (?,?,?,?,?)', [$productId,$products[0]->title,$products[0]->price,$cartId[0]->id,1]);
        }else{
          DB::insert('insert into cart_Item (productId,title,price,cartId,quantity) values (?,?,?,?,?)', [$productId,$products[0]->title,$products[0]->newPrice,$cartId[0]->id,1]);
        }
      }
      else{
        DB::table('cart_Item')
          ->where('productId',$productId)
          ->update(['quantity'=>DB::raw('quantity+1')]);
      }

      $categories = DB::select('SELECT * FROM categories');
      view("userInterface.header",["categories"=>$categories]);
    //  }
      //return $tasks_controller->index($userId);
      return redirect("/HomePage/".$userId);
      //
  }
  public function addcartToUserProductPage(Request $request, $productId,$categoryId,$userId){
      $userName = DB::select('SELECT * FROM users WHERE id = '.$userId);
      //DB::insert('insert into carts (userId,name) values (?,?)', [$userId,$userName[0]->name]);
      $getLast = DB::select('SELECT * FROM carts WHERE userId = '.$userId.' ORDER BY id DESC LIMIT 1');
      $cartId = $getLast[0]->id;

      DB::table('carts')
        ->where('id',$cartId)
        ->update(['name'=>$userName[0]->name]);


      $cartId = DB::select('SELECT * FROM carts WHERE userId = '.$userId.' ORDER BY id DESC LIMIT 1');
      $products=DB::select('SELECT * FROM products WHERE id = '.$productId);
      $tasks_controller = new UfidaController;
      $categories = DB::select('SELECT * FROM categories');
      view("userInterface.header",["categories"=>$categories]);

      //foreach ($cartId as $cartId) {
        // code...
        $checkNull=DB::table('cart_item')
                  ->select('*')
                  ->where('productId',$productId)
                  ->first();
        if(is_null($checkNull)){
          $checkproductPrice=DB::table('products')
                    ->select('*')
                    ->where('id',$productId)
                    ->having('newPrice','>','0')
                    ->first();
          if(is_null($checkproductPrice)){
              DB::insert('insert into cart_Item (productId,title,price,cartId,quantity) values (?,?,?,?,?)', [$productId,$products[0]->title,$products[0]->price,$cartId[0]->id,1]);
          }else{
            DB::insert('insert into cart_Item (productId,title,price,cartId,quantity) values (?,?,?,?,?)', [$productId,$products[0]->title,$products[0]->newPrice,$cartId[0]->id,1]);
          }

        }
        else{
          DB::table('cart_Item')
            ->where('productId',$productId)
            ->update(['quantity'=>DB::raw('quantity+1')]);
        }

    //  }
      //return $tasks_controller->index($userId);
      return redirect("/HomePage/category/".$productId);
      //
  }
  public function showcart($userId){
    $userName = DB::select('SELECT * FROM users WHERE id = '.$userId);
    $cartss= DB::select('SELECT * FROM carts WHERE userId ='.$userId);
    //$orders=DB::select('SELECT * FROM carts WHERE userId ='.$userId);
    $lastCart= DB::select('SELECT * FROM carts WHERE userId = '.$userId.' ORDER BY  id DESC LIMIT 1');
    $getCartId = $lastCart[0]->id;


    $cartQuantites=DB::select("SELECT SUM(quantity) AS quantity FROM cart_item JOIN carts on(carts.id=cart_item.cartId) WHERE cartId = ".$getCartId." GROUP BY(productId)");
    $carttitles=DB::select("SELECT * , SUM(quantity)  AS quantity , (price*quantity) As totalPrice FROM cart_item  JOIN carts on(carts.id=cart_item.cartId) WHERE cartId = ".$getCartId." GROUP BY(productId)");
    $carttotalUser=DB::select("SELECT *, SUM(price) As totalPrice FROM cart_item  JOIN carts on(carts.id=cart_item.cartId) WHERE cartId = ".$getCartId." GROUP BY(userId)");
    $cartTotalUserLast=DB::select("SELECT SUM(price) As totalPrice FROM cart_item  JOIN carts on(carts.id=cart_item.cartId) WHERE cartId = ".$getCartId." GROUP BY(userId) ORDER BY (userId) DESC LIMIT 1");
    //$ordersCarts=DB::select("SELECT *, SUM(price) As totalPrice FROM carts  JOIN carts on(carts.id=cart_item.cartId) WHERE userId = ".$userId);

    //DB::insert('INSERT INTO orders (total,cartId,userId) values (?,?,?) WHERE userId='.$userId,[$cartTotalUserLast[0]->totalPrice,$lastCart[0]->id,$userId]);


    return view('showcart',[
      'totalPrices'=>$carttotalUser,
      'quantitiess'=>$cartQuantites,
      'cartss'=>$carttitles,
      'users'=>$userName,
    ]);

  }
  public function ShowCartUfida($userId){
    $userName = DB::select('SELECT * FROM users WHERE id ='.$userId);
    $cartss= DB::select('SELECT * FROM carts WHERE userId ='.$userId);
    //$orders=DB::select('SELECT * FROM carts WHERE userId ='.$userId);
    $lastCart= DB::select('SELECT * FROM carts WHERE userId = '.$userId.' ORDER BY  id DESC LIMIT 1');
    $getCartId = $lastCart[0]->id;


    $cartQuantites=DB::select("SELECT SUM(quantity) AS quantity FROM cart_item JOIN carts on(carts.id=cart_item.cartId) WHERE cartId = ".$getCartId." GROUP BY(productId)");
    //$carttitles=DB::select("SELECT * , SUM(cart_item.quantity)  AS cart_itemQuantity , products.id as productId, SUM(cart_item.price*cart_item.quantity) As totalPrice ,cart_item.id As cart_itemId FROM cart_item  JOIN carts on(carts.id=cart_item.cartId) JOIN products on(products.id=cart_item.productId) WHERE cartId = ".$getCartId." GROUP BY(cart_item.productId)");
    $carttitles=DB::select("SELECT * , SUM(cart_item.quantity)  AS cart_itemQuantity , products.id as productId,cart_item.price*cart_item.quantity As totalPrice ,cart_item.price as finalProductPrice,cart_item.id As cart_itemId FROM cart_item  JOIN carts on(carts.id=cart_item.cartId) JOIN products on(products.id=cart_item.productId) WHERE cartId = ".$getCartId." GROUP BY(cart_item.productId)");
    $carttotalUser=DB::select("SELECT *, SUM(price) As totalPrice FROM cart_item  JOIN carts on(carts.id=cart_item.cartId) WHERE cartId = ".$getCartId." GROUP BY(userId)");
    $cartTotalUserLast=DB::select("SELECT SUM(price) As totalPrice FROM cart_item  JOIN carts on(carts.id=cart_item.cartId) WHERE cartId = ".$getCartId." GROUP BY(userId) ORDER BY (userId) DESC LIMIT 1");
    return view('userInterface.Chart',
    [
      'totalPrices'=>$carttotalUser,
      'quantities'=>$cartQuantites,
      'itemCarts'=>$carttitles,
    ]
    );
  }
  public function PostCartUfida(Request $request, $userId){
    $userName = DB::select('SELECT * FROM users WHERE id = '.$userId);
    $cartss= DB::select('SELECT * FROM carts WHERE userId ='.$userId);
    $orders=DB::select('SELECT * FROM carts WHERE userId ='.$userId);
    $lastCart= DB::select('SELECT * FROM carts ORDER BY  id DESC LIMIT 1');

    $lastCart= DB::select('SELECT * FROM carts WHERE userId = '.$userId.' ORDER BY  id DESC LIMIT 1');
    $getCartId = $lastCart[0]->id;


    $cartQuantites=DB::select("SELECT SUM(quantity) AS quantity FROM cart_item JOIN carts on(carts.id=cart_item.cartId) WHERE cartId = ".$getCartId." GROUP BY(productId)");
    //$carttitles=DB::select("SELECT * , SUM(cart_item.quantity)  AS quantity, SUM(cart_item.price) As totalPrice FROM cart_item  JOIN carts on(carts.id=cart_item.cartId) JOIN products on(products.id=cart_item.productId) WHERE cartId = ".$getCartId." GROUP BY(productId)");
    $carttitles=DB::select("SELECT * , SUM(cart_item.quantity)  AS cart_itemQuantity , products.id as productId, SUM(cart_item.price) As totalPrice ,cart_item.id As cart_itemId FROM cart_item  JOIN carts on(carts.id=cart_item.cartId) JOIN products on(products.id=cart_item.productId) WHERE cartId = ".$getCartId." GROUP BY(cart_item.productId)");
    $carttotalUser=DB::select("SELECT *, SUM(price) As totalPrice FROM cart_item  JOIN carts on(carts.id=cart_item.cartId) WHERE cartId = ".$getCartId." GROUP BY(userId)");
    $cartTotalUserLast=DB::select("SELECT SUM(price) As totalPrice FROM cart_item  JOIN carts on(carts.id=cart_item.cartId) WHERE cartId = ".$getCartId." GROUP BY(userId) ORDER BY (userId) DESC LIMIT 1");

    //$request->get('quantities[0]');
    //$input = $request->all();
    $name = $request->input('quantities');
    $i=0;
    foreach ($carttitles as $carttitle) {
      //$productIdQ=$carttitle->productId;
      DB::table('cart_Item')
        ->where('productId',$carttitle->productId)
        ->update(['quantity'=>$name[$i]]);
      $i++;
      }
    //  $request->input(''.)
    //}
    $checkNull=DB::table('orders')
              ->select('*')
              ->where('userId',$userId)
              ->first();



    if(is_null($checkNull)){
      DB::insert('INSERT INTO orders (total,cartId,userId) values (?,?,?)',[$cartTotalUserLast[0]->totalPrice,$lastCart[0]->id,$userId]);
    }
    else{
      $order = DB::select('SELECT * FROM orders  WHERE userId ='.$userId.' ORDER BY  id DESC LIMIT 1');
      $isUpdatable = $order[0]->updatable;
      if($isUpdatable==1){
        DB::table('orders')
          ->where('userId',$userId)
          ->update(['total'=>$cartTotalUserLast[0]->totalPrice,'cartId'=>$lastCart[0]->id]);
      }else{
        DB::insert('INSERT INTO orders (total,cartId,userId) values (?,?,?)',[$cartTotalUserLast[0]->totalPrice,$lastCart[0]->id,$userId]);
      }
    }
      //end of it




    return redirect("/HomePage/category/ConfirmCart/".$userId);

  }
  public function PostCart($userId){
    $userName = DB::select('SELECT * FROM users WHERE id = '.$userId);
    $cartss= DB::select('SELECT * FROM carts WHERE userId ='.$userId);
    $orders=DB::select('SELECT * FROM carts WHERE userId ='.$userId);
    $lastCart= DB::select('SELECT * FROM carts ORDER BY  id DESC LIMIT 1');

    $lastCart= DB::select('SELECT * FROM carts WHERE userId = '.$userId.' ORDER BY  id DESC LIMIT 1');
    $getCartId = $lastCart[0]->id;


    $cartQuantites=DB::select("SELECT SUM(quantity) AS quantity FROM cart_item JOIN carts on(carts.id=cart_item.cartId) WHERE cartId = ".$getCartId." GROUP BY(productId)");
    $carttitles=DB::select("SELECT * , SUM(quantity)  AS quantity , SUM(price) As totalPrice FROM cart_item  JOIN carts on(carts.id=cart_item.cartId) WHERE cartId = ".$getCartId." GROUP BY(productId)");
    $carttotalUser=DB::select("SELECT *, SUM(price) As totalPrice FROM cart_item  JOIN carts on(carts.id=cart_item.cartId) WHERE cartId = ".$getCartId." GROUP BY(userId)");
    $cartTotalUserLast=DB::select("SELECT SUM(price) As totalPrice FROM cart_item  JOIN carts on(carts.id=cart_item.cartId) WHERE cartId = ".$getCartId." GROUP BY(userId) ORDER BY (userId) DESC LIMIT 1");

    $checkNull=DB::table('orders')
              ->select('*')
              ->where('userId',$userId)
              ->first();



    if(is_null($checkNull)){
      DB::insert('INSERT INTO orders (total,cartId,userId) values (?,?,?)',[$cartTotalUserLast[0]->totalPrice,$lastCart[0]->id,$userId]);
    }
    else{
      $order = DB::select('SELECT * FROM orders  WHERE userId ='.$userId.' ORDER BY  id DESC LIMIT 1');
      $isUpdatable = $order[0]->updatable;
      if($isUpdatable==1){
        DB::table('orders')
          ->where('userId',$userId)
          ->update(['total'=>$cartTotalUserLast[0]->totalPrice,'cartId'=>$lastCart[0]->id]);
      }else{
        DB::insert('INSERT INTO orders (total,cartId,userId) values (?,?,?)',[$cartTotalUserLast[0]->totalPrice,$lastCart[0]->id,$userId]);
      }
    }
      //end of it



    return redirect("online/products/Order/".$userId);

  }
  public function ShowOrder($userId){
      $userName = DB::select('SELECT * FROM users WHERE id = '.$userId);
      return view('userInterface.orderReg',[
        'user'=>$userName[0]
      ]);
  }
  public function CreateOrder(Request $request,$userId){
      $lastCart = DB::select("SELECT * FROM carts WHERE userId = ".$userId."  ORDER BY (id) DESC LIMIT 1");
      $lastCartId=$lastCart[0]->id;
      $itemLastCarts=DB::select("SELECT * FROM cart_item WHERE cartId = ".$lastCartId);

      $user =DB::select('SELECT * FROM users WHERE id = '.$userId);
      $request->validate([
              'name' => 'required',
              'email'=>'required',
              'mobile'=>'required',
              'Telephone' => 'required',
              'address' => 'required',
              'city'=> 'required',
      ]);

      $order = DB::select('SELECT * FROM orders  WHERE userId ='.$userId.' ORDER BY  id DESC LIMIT 1');

      $orderId = $order[0]->id;
      $isUpdatable = $order[0]->updatable;
      //DB::insert('insert into orders (userId,name,email,line1,line2,mobile,city,province ,country,promo) values (?,?,?,?,?,?,?,?,?,?)', [$userId[0],$request->input('name'),$request->input('email'),$request->input('line1'),$request->input('line2'),$request->input('mobile'),$request->input('city'),$request->input('province'),$request->input('country'),

      DB::table('orders')
        ->where('id',$orderId)
        ->update(['name'=>$request->input('name'),'email'=>$request->input('email'),'line1'=>$request->input('Telephone'),'mobile'=>$request->input('mobile'),'city'=>$request->input('city'),
        'province'=>$request->input('address')]);

      $order=DB::select('SELECT * FROM orders WHERE userId ='.$userId.' ORDER BY  id DESC LIMIT 1');
      $orderId =$order[0]->id;
      foreach($itemLastCarts as $itemLastCart){
        $productQuantity=DB::table('products')
                          ->where('id',$itemLastCart->productId)
                          ->update(['quantity'=>DB::raw('quantity-'.$itemLastCart->quantity)]);
      }


      DB::table('orders')
        ->where('id',$orderId)
        ->update(['updatable'=>0]);

      //DB::insert('insert into transaction (userId,orderId,type,mode) values (?,?,?,?)', [$userId,$orderId,$request->input('type'),$request->input('mode')]);
      //don't insert into carts
      $getLast = DB::select('SELECT * FROM carts WHERE userId = '.$userId.' ORDER BY id DESC LIMIT 1');
      //$lastCart= DB::select('SELECT * FROM carts WHERE userId = '.$userId.' ORDER BY  id DESC LIMIT 1');
      $cartId = $getLast[0]->id;
      DB::table('carts')
        ->where('id',$cartId)
        ->update(['updatable'=>0]);
      DB::insert("INSERT INTO carts (userId) values(?)",[$userId]);
      return redirect("HomePage/".$userId);

  }
  public function InsertIntoTran(Request $request,$userId,$orderId){

    $lastCart = DB::select("SELECT * FROM carts WHERE userId = ".$userId."  ORDER BY (id) DESC LIMIT 1");
    $lastCartId=$lastCart[0]->id;
    $itemLastCarts=DB::select("SELECT * FROM cart_item WHERE cartId = ".$lastCartId);

    $cartQuantites=DB::select("SELECT *, SUM(quantity) AS quantity FROM cart_item JOIN carts on(carts.id=cart_item.cartId) WHERE cartId = ".$lastCartId." GROUP BY(productId)");
    $carttitles=DB::select("SELECT * , SUM(quantity)  AS quantity , SUM(price) As totalPrice FROM cart_item  JOIN carts on(carts.id=cart_item.cartId) WHERE userId = ".$userId." GROUP BY(productId)");
    $carttotalUser=DB::select("SELECT *, SUM(price) As totalPrice FROM cart_item  JOIN carts on(carts.id=cart_item.cartId) WHERE cartId = ".$lastCartId." GROUP BY(userId)");
    $cartTotalUserLast=DB::select("SELECT SUM(price) As totalPrice FROM cart_item  JOIN carts on(carts.id=cart_item.cartId) WHERE cartId = ".$lastCartId." GROUP BY(userId) ORDER BY (userId) DESC LIMIT 1");
    $getPrice = $carttotalUser[0]->totalPrice;

    if($getPrice>1000){
      ///DB::insert("INSERT INTO users (points) values(300)");
      $productQuantity=DB::table('users')
                        ->where('id',$userId)
                        ->update(['points'=>DB::raw('points+1000')]);
    }


    $productID = $cartQuantites[0]->productId;

    foreach($itemLastCarts as $itemLastCart){
      $productQuantity=DB::table('products')
                        ->where('id',$itemLastCart->productId)
                        ->update(['quantity'=>DB::raw('quantity-'.$itemLastCart->quantity)]);
    }


    DB::table('orders')
      ->where('id',$orderId)
      ->update(['updatable'=>0]);

    DB::insert('insert into transaction (userId,orderId,type,mode) values (?,?,?,?)', [$userId,$orderId,$request->input('type'),$request->input('mode')]);
    DB::table('orders')
      ->where('id',$orderId)
      ->update(['paid'=>1]);
    //don't insert into carts
    $getLast = DB::select('SELECT * FROM carts WHERE userId = '.$userId.' ORDER BY id DESC LIMIT 1');
    //$lastCart= DB::select('SELECT * FROM carts WHERE userId = '.$userId.' ORDER BY  id DESC LIMIT 1');
    $cartId = $getLast[0]->id;
    DB::table('carts')
      ->where('id',$cartId)
      ->update(['updatable'=>0]);
    DB::insert("INSERT INTO carts (userId) values(?)",[$userId]);
    //end of it



      //check order colum exists to insert in it

      return view('/done');
  }
  public function ShowReview($productId,$userId){
    $getProductReview = DB::select('SELECT * FROM product_review WHERE productId = '.$productId);
    $getProduct = DB::select('SELECT * FROM products  WHERE id = '.$productId);
    $getUser = DB::select('SELECT * FROM product_review WHERE id = '.$userId);
    //to get User Name
    $userReview = DB::select("SELECT * FROM users  JOIN product_review on(users.id=product_review.userId) WHERE published= 1");

    return view('/ProductReviews',[
      'reviews'=>$userReview,
      'productId'=>$productId,
      'userId'=>$userId,
      'user'=>$getUser,
    ]);
  }

  public function SubmitWriteReview(Request $request,$productId,$userId){
      DB::insert('insert into product_review(userId,productId,title,content) values (?,?,?,?)', [$userId,$productId,$request->input('title'),$request->input('content')]);
      return redirect('online/products/'.$userId);
  }

  public function ShowReviewOnly($productId){
    $getProductReview = DB::select('SELECT * FROM product_review WHERE productId = '.$productId);
    $getProduct = DB::select('SELECT * FROM products  WHERE id = '.$productId);
    //$getUser = DB::select('SELECT * FROM product_review WHERE id = '.$userId);
    //to get User Name
    $userReview = DB::select("SELECT *  FROM users  JOIN product_review on(users.id=product_review.userId)");
    $categories = DB::select('SELECT * FROM categories');
    view("userInterface.header",["categories"=>$categories]);

    return view('ShowReviewOnly',[
      'reviews'=>$userReview,
      'productId'=>$productId,
      //'userId'=>$userId,
      //'user'=>$getUser,
    ]);
  }

  public function ShowProductsOnly()
    {
        $productCategory=DB::select("SELECT * , products.title  AS productTitle, categories.id As categoriesId  FROM products JOIN product_categories on(products.id=product_categories.productId) JOIN categories on(product_categories.categoryId=categories.id) GROUP BY(categories.title)");
        $productWithCategory=DB::select("SELECT * , products.title  AS productTitle , categories.id As categoriesId FROM products JOIN product_categories on(products.id=product_categories.productId) JOIN categories on(product_categories.categoryId=categories.id)");
        //$userName = DB::select('SELECT * FROM users WHERE id = '.$userId);
        $products = DB::select('SELECT * FROM products');

        $categories = DB::select('SELECT * FROM categories');
        view("userInterface.header",["categories"=>$categories]);
        return view('ShowProductsOnly', [
          'cars'=>$products,
          'productCategories'=>$productCategory,
          'productWithCategories'=>$productWithCategory,
        ]);
        //return view('ShowProductsOnly');
    }
    public function Register(Request $request){
      //Auth::register();
      $request->validate([
           'name' => 'required',
           'email' => 'required|email',
           'Password' => 'required'
       ]);
       $user = User::create(['name'=>$request->input('name'),'email'=>$request->input('email'),'password'=>$request->input('Password')]);
       Auth::login($user);
       return redirect("HomePage");
    }
    public function doLogout(Request $request) {
      Auth::logout();
      return redirect('/online/login');
  }
  public function header(){
    $categories = DB::select('SELECT * FROM categories');
    return view("userInterface.header",["categories"=>$categories]);
  }
  public function ConfirmCartUfida($userId){
    $userName = DB::select('SELECT * FROM users WHERE id ='.$userId);
    $cartss= DB::select('SELECT * FROM carts WHERE userId ='.$userId);
    //$orders=DB::select('SELECT * FROM carts WHERE userId ='.$userId);
    $lastCart= DB::select('SELECT * FROM carts WHERE userId = '.$userId.' ORDER BY  id DESC LIMIT 1');
    $getCartId = $lastCart[0]->id;
    $lastCartId=$lastCart[0]->id;
    $itemLastCarts=DB::select("SELECT * FROM cart_item WHERE cartId = ".$lastCartId);

    $cartQuantites=DB::select("SELECT SUM(quantity) AS quantity FROM cart_item JOIN carts on(carts.id=cart_item.cartId) WHERE cartId = ".$getCartId." GROUP BY(productId)");
    //$checkCartTitles=DB::select("SELECT * , SUM(cart_item.quantity)  AS cart_itemQuantity , products.id as productId,cart_item.price*cart_item.quantity As totalPrice ,products.price as finalProductPrice,cart_item.id As cart_itemId FROM cart_item  JOIN carts on(carts.id=cart_item.cartId) JOIN products on(products.id=cart_item.productId) WHERE cartId = ".$getCartId." GROUP BY(cart_item.productId)");

    $carttitles=DB::select("SELECT * , SUM(cart_item.quantity)  AS cart_itemQuantity , products.id as productId,cart_item.price*cart_item.quantity As totalPrice ,cart_item.price as finalProductPrice,cart_item.id As cart_itemId FROM cart_item  JOIN carts on(carts.id=cart_item.cartId) JOIN products on(products.id=cart_item.productId) WHERE cartId = ".$getCartId." GROUP BY(cart_item.productId)");
    $carttotalUser=DB::select("SELECT *, SUM(price) As totalPrice FROM cart_item  JOIN carts on(carts.id=cart_item.cartId) WHERE cartId = ".$getCartId." GROUP BY(userId)");
    $cartTotalUserLast=DB::select("SELECT SUM(price) As totalPrice FROM cart_item  JOIN carts on(carts.id=cart_item.cartId) WHERE cartId = ".$getCartId." GROUP BY(userId) ORDER BY (userId) DESC LIMIT 1");


    return view("userInterface.cart_confirm",[
      'itemCarts'=>$carttitles,
      'overAllTotal'=>$cartTotalUserLast[0],
    ]);
  }
  public function ShowDescription($productId,$userId){
    $getProduct= DB::select('SELECT * FROM products WHERE id ='.$productId);
    $getFirstPro=DB::select('SELECT * FROM products ORDER BY  id DESC LIMIT 1');
    $getLastPro=DB::select('SELECT * FROM products ORDER BY  id ASC LIMIT 1');
    $selectRanId=rand($getFirstPro[0]->id,$getLastPro[0]->id);
    $getRandVal=DB::select('SELECT * FROM products WHERE id ='.$selectRanId);
    $arrayOfRand=array();


    for ($i=0; $i < 4; $i++) {
      while(empty($getRandVal) || in_array($selectRanId,$arrayOfRand) || $productId == $selectRanId){
        $selectRanId=rand($getFirstPro[0]->id,$getLastPro[0]->id);
        $getRandVal=DB::select('SELECT * FROM products WHERE id ='.$selectRanId);
      }
      array_push($arrayOfRand,$selectRanId);
    }
    $getRandVal0=DB::select('SELECT * FROM products WHERE id ='.$arrayOfRand[0]);
    $getRandVal1=DB::select('SELECT * FROM products WHERE id ='.$arrayOfRand[1]);
    $getRandVal2=DB::select('SELECT * FROM products WHERE id ='.$arrayOfRand[2]);
    $getRandVal3=DB::select('SELECT * FROM products WHERE id ='.$arrayOfRand[3]);
    return view("userInterface.description",[
      "product"=>$getProduct[0],
      "randValue0"=>$getRandVal0,
      "randValue1"=>$getRandVal1,
      "randValue2"=>$getRandVal2,
      "randValue3"=>$getRandVal3,
    ]);
  }
  public function addcartToShowDescription(Request $request,$productId,$selectedProductId,$userId){
    $userName = DB::select('SELECT * FROM users WHERE id = '.$userId);
    //DB::insert('insert into carts (userId,name) values (?,?)', [$userId,$userName[0]->name]);
    $getLast = DB::select('SELECT * FROM carts WHERE userId = '.$userId.' ORDER BY id DESC LIMIT 1');
    $cartId = $getLast[0]->id;

    DB::table('carts')
      ->where('id',$cartId)
      ->update(['name'=>$userName[0]->name]);


    $cartId = DB::select('SELECT * FROM carts WHERE userId = '.$userId.' ORDER BY id DESC LIMIT 1');
    $products=DB::select('SELECT * FROM products WHERE id = '.$selectedProductId);
    $tasks_controller = new UfidaController;

    //foreach ($cartId as $cartId) {
      // code...
    //DB::insert('insert into cart_Item (productId,title,price,cartId,quantity) values (?,?,?,?,?)', [$productId,$products[0]->title,$products[0]->price,$cartId[0]->id,1]);
    $checkNull=DB::table('cart_item')
              ->select('*')
              ->where('productId',$selectedProductId)
              ->first();

    if(is_null($checkNull)){
      $checkproductPrice=DB::table('products')
                ->select('*')
                ->where('id',$selectedProductId)
                ->having('newPrice','>','0')
                ->first();
      if(is_null($checkproductPrice)){
          DB::insert('insert into cart_Item (productId,title,arTitle,price,cartId,quantity) values (?,?,?,?,?,?)', [$selectedProductId,$products[0]->title,$products[0]->arTitle,$products[0]->price,$cartId[0]->id,1]);
      }else{
        DB::insert('insert into cart_Item (productId,title,arTitle,price,cartId,quantity) values (?,?,?,?,?,?)', [$selectedProductId,$products[0]->title,$products[0]->arTitle,$products[0]->newPrice,$cartId[0]->id,1]);
      }
    }
    else{
      DB::table('cart_Item')
        ->where('productId',$selectedProductId)
        ->update(['quantity'=>DB::raw('quantity+1')]);
    }


  //  }
    //return $tasks_controller->index($userId);
    return redirect("/online/ShowProducts/".$productId."/".$userId."#Recommended");
    //
  }
  public function DeleteCart(Request $request,$cartItemId){

    $products=DB::select('DELETE FROM cart_item WHERE id = '.$cartItemId);
    return redirect("/HomePage/category/ShowCart/1#table");
  }
}
