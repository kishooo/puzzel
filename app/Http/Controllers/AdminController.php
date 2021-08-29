<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\test;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Middleware;

class AdminController extends Controller
{

  public function login(){
    return view('login1');
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
        if($userType==1){
          return redirect("admin/online/products/".$userId);
        }else{
          return redirect("online/products/".$userId);
        }
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
    //$getUser =DB::select('SELECT * FROM users WHERE id = '.$userId);
      //
      $getAllCategories =DB::select('SELECT * FROM categories');
      //return view('ShowCategoriesAdmin',['categories'=>$getAllCategories]);
    return view("Eproduct",['user'=>$userId,
                          'categories'=>$getAllCategories]);
  }
  public function insert(Request $request,$userId){

    $request->validate([
            'name' => 'required',
            'quantity' => 'required|integer|min:0|max:2021',
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
              ->where('title',$request->category)
              ->first();

    //$test = mysql_query($category);
    //DB::insert('insert into products (title,price,newPrice,image) values (?,?,?,?)', [$request->input('name'),$request->input('price'),$request->input('newPrice'),$newImageName]);
    if(is_null($category)){
      DB::insert('INSERT into categories (title) values(?)',[$request->category]);
      $getCategory = DB::select("SELECT * FROM categories ORDER BY id DESC LIMIT 1");
      $getIndexCategory=$getCategory[0]->id;
    }else{

      $getCategory=DB::table('categories')
                ->select('*')
                ->where('title',$request->category)
                ->get();
      $getIndexCategory=$getCategory[0]->id;
    }



    if(!empty($request->input('newPrice'))){
      DB::insert('insert into products (title,price,newPrice,image,quantity) values (?,?,?,?,?)', [$request->input('name'),$request->input('price'),$request->input('newPrice'),$newImageName,$request->input('quantity')]);

      }else{
          DB::insert('insert into products (title,price,image,quantity) values (?,?,?,?)', [$request->input('name'),$request->input('price'),$newImageName,$request->input('quantity')]);
      }
      $getProduct = DB::select("SELECT * FROM products ORDER BY id DESC LIMIT 1");
      $getIndexProduct = $getProduct[0]->id;
      DB::insert('insert into product_categories (productId,categoryId) values(?,?)',[$getIndexProduct,$getIndexCategory]);
      return redirect("admin/online/products/".$userId);
  }

  public function ShowUsersAdmin($userId)
  {
    $getAllUsers =DB::select('SELECT * FROM users');
    return view('DUsers',[
      'userId'=>$userId,
      'users'=>$getAllUsers
    ]);
  }

  public function ShowUsersMakeAdmin(Request $request,$userId,$selectedUserId)
  {
    $getAllUsers =DB::select('SELECT * FROM users');
    $check = DB::select("SELECT * FROM users WHERE id=".$selectedUserId);
    $checkUserType = $check[0]->UserType;
    //$MakeAdminOrNot =DB::select('SELECT * FROM users WHERE id =');

    if($checkUserType >=  1){
      DB::table('users')
        ->where('id',$selectedUserId)
        ->update(['UserType'=>0]);
    }else{
      DB::table('users')
        ->where('id',$selectedUserId)
        ->update(['UserType'=>1]);
    }

    //return view('ShowUser',['users'=>$getAllUsers,
      //                      'userId'=>$userId]);
    return redirect("/admin/ShowUsers/".$userId);

  }

  public function ShowReviewAdmin($userId)
  {
    //$getAllReview = DB::select('SELECT * FROM product_review');
    $getAllReview = DB::select("SELECT * FROM users  JOIN product_review on(users.id=product_review.userId)");
    return view('DReview',[
      'userId'=>$userId,
      'reviews'=>$getAllReview]);
  }

  public function HideShowReview($reviewId,$userId)
  {
    $check = DB::select("SELECT * FROM product_review WHERE id=".$reviewId);
    $checkPublished = $check[0]->published;
    if($checkPublished >=1  ){
      DB::table('product_review')
        ->where('id',$reviewId)
        ->update(['published'=>0]);
    }
    else{
      DB::table('product_review')
        ->where('id',$reviewId)
        ->update(['published'=>1]);
    }

    $getAllReview = DB::select("SELECT * FROM users  JOIN product_review on(users.id=product_review.userId)");
    //$getAllReview = DB::select("SELECT * FROM users  JOIN product_review on(users.id=product_review.userId)");
    /*return view('ShowReviewAdmin',[
      'reviews'=>$getAllReview,
      'userId'=>$userId,
    ]);*/
    return redirect("admin/ShowReviewAdmin/".$userId);
  }
  public function showcategories($userId)
  {
    $getAllCategories =DB::select('SELECT * FROM categories');
    return view('ShowCategoriesAdmin',['categories'=>$getAllCategories]);
  }

  public function showOrders($userId)
  {
  $orderTable=DB::select("SELECT * FROM orders WHERE paid =1");

    return view('Dorders',['ordersTable'=>$orderTable]);
  }
  public function index($userId)
    {
        $productCategory=DB::select("SELECT * , products.title  AS productTitle,categories.title as categoryTitle , categories.id As categoriesId  FROM products JOIN product_categories on(products.id=product_categories.productId) JOIN categories on(product_categories.categoryId=categories.id) GROUP BY(categories.title)");
        $allProductCategory=DB::select("SELECT * , products.title  AS productTitle,categories.title as categoryTitle , categories.id As categoriesId  FROM products JOIN product_categories on(products.id=product_categories.productId) JOIN categories on(product_categories.categoryId=categories.id) GROUP BY(categories.title)");
        $productWithCategory=DB::select("SELECT * , products.title  AS productTitle , categories.id As categoriesId FROM products JOIN product_categories on(products.id=product_categories.productId) JOIN categories on(product_categories.categoryId=categories.id)");
        $user= DB::select('SELECT * FROM users WHERE id = '.$userId);
        $products = DB::select('SELECT * FROM products');


        return view('Dproducts',[ 'user'=>$user[0],
                                  'allProductCategories'=>$allProductCategory,
                                  'productCategories'=>$productCategory,
                                  'productWithCategories'=>$productWithCategory]);
    }

      public function ShowProductsWithCat(Request $request,$productCategoryId,$userId){

        $productCategory=DB::select("SELECT * , products.title  AS productTitle,categories.title as categoryTitle , categories.id As categoriesId  FROM products JOIN product_categories on(products.id=product_categories.productId) JOIN categories on(product_categories.categoryId=categories.id)WHERE categories.id = ".$productCategoryId." GROUP BY(categories.title)");
        $allProductCategory=DB::select("SELECT * , products.title  AS productTitle,categories.title as categoryTitle , categories.id As categoriesId  FROM products JOIN product_categories on(products.id=product_categories.productId) JOIN categories on(product_categories.categoryId=categories.id) GROUP BY(categories.title)");
        $productWithCategory=DB::select("SELECT * , products.title  AS productTitle , categories.id As categoriesId FROM products JOIN product_categories on(products.id=product_categories.productId) JOIN categories on(product_categories.categoryId=categories.id)");
        $user= DB::select('SELECT * FROM users WHERE id = '.$userId);

        return view('Dproducts',[ 'user'=>$user[0],
                                  'allProductCategories'=>$allProductCategory,

                                  'productCategories'=>$productCategory,
                                  'productWithCategories'=>$productWithCategory]);
      }

    public function ShowEditProduct(Request $request, $productId,$userId)
      {
          $products = DB::select('SELECT * FROM products WHERE id='.$productId);
          //$editProduct =DB::update('update into products(title,price,newPrice,image) values(?,?,?,?) Where Id = '.$productId,[$request->input('name'),$request->input('price'),$request->input('newPrice'),$newImageName])
          $getUser =DB::select('SELECT * FROM users WHERE id = 1');

          return view('Editp',[
            'product'=>$products[0],
            'user'=>$getUser[0]
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
              ->update(['title' => $request->input('name'),'price' =>$request->input('price'),'newPrice'=>$request->input('newPrice'),'image'=>$newImageName,'quantity'=>$request->input('quantity'),'appeared'=>$request->input('appeared')]);
            $tasks_controller = new UfidaController;

            //return $tasks_controller->index($userId);
            return redirect("/admin/online/products/".$userId);
        }
        public function ShowHideProducts(Request $request,$selectedProductId,$userId)
        {
          $getAllUsers =DB::select('SELECT * FROM products');
          $check = DB::select("SELECT * FROM products WHERE id=".$selectedProductId);
          $checkProductType = $check[0]->appeared;
          //$MakeAdminOrNot =DB::select('SELECT * FROM users WHERE id =');

          if($checkProductType >=  1){
            DB::table('products')
              ->where('id',$selectedProductId)
              ->update(['appeared'=>0]);
          }else{
            DB::table('products')
              ->where('id',$selectedProductId)
              ->update(['appeared'=>1]);
          }

          return redirect("/admin/online/products/".$userId);

        }

        public function HomePage(Request $request,$userId)
        {
          $orderTotalPrice=DB::select("SELECT * , SUM(quantity)  AS quantity , SUM(price) As totalPrice FROM cart_item  JOIN carts on(carts.id=cart_item.cartId) JOIN orders on(orders.cartId=carts.id) WHERE orders.paid = 1 GROUP BY(orders.paid)");
          $countAllUsers=DB::select("SELECT COUNT(id) as numberOfUsers FROM users");
          $getUsers=DB::select("SELECT COUNT(id) as numberOfUsers FROM users");
          $countOrder=DB::select("SELECT COUNT(id) as numberOfOrders FROM orders WHERE paid=1");
          //$carttotalUser=DB::select("SELECT *, SUM(price) As totalPrice FROM cart_item  JOIN carts on(carts.id=cart_item.cartId) JOIN users on(users.id=carts.userId) GROUP BY(carts.id)");
          $orderTable=DB::select("SELECT * FROM orders  WHERE paid=1");
          return view("index",[
            'users'=>$countAllUsers[0]->numberOfUsers,
            'ordersTotalPrice'=>$orderTotalPrice[0]->totalPrice,
            'ordersTable'=>$orderTable,
            'countOrder'=>$countOrder[0]->numberOfOrders,
          ]);
        }
        public function OutOfStockProducts($userId){
            $products =DB::select("SELECT * FROM products WHERE quantity<3");
            return view("outOfStock",['products'=>$products]);
        }

        public function doLogout(Request $request) {
          Auth::logout();
        return redirect('/admin/login');
        }
        public function CreateCategory($userId){
          return view('Ncat',['userId'=>$userId]);
        }
        public function DoCreateCategory(Request $request,$userId){
          DB::insert('INSERT into categories (title) values(?)',[$request->input('category')]);
          return redirect("/admin/online/products/".$userId);
        }

}
