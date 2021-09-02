@extends('userInterface.arabic.arheader')
@section('content')

            
               <div class="small-container" dir="rtl">
                <div class="row">
                    <div class="col-2">
                        <img src="3-01.jpg" width="100%">
                    </div>
                    <div class="col-2"> 
                        <div class="descr">
                    <h4>اسم المنتج :<span>Clorina white</span></h4> 
                    <h4>الاستخدام الموصى به : <span>Household disinfecting – sanitizing and laundry bleach</span></h4>
                        <h4>كود المنتج : <span>UF9654079</span></h4>
                    <h4>السعر: <span>50.0 EGP</span></h4> 
                    <h4>تفاصيل المنتج:</h4>
                    <p>REVISED INFORMATION: Significant changes to regulatory or health information for this revision is 
                        indicated by a bar in the left-hand margin of the SDS.
                        The information provided in this Safety Data Sheet is correct to the best of our knowledge, information 
                        and belief at the date of its publication. The information given is designed only as a guidance for safe 
                        handling, use, processing, storage, transportation, disposal and release and is not to be considered a 
                        warranty or quality specification. The information relates only to the specific material designated and 
                        may not be valid for such material used in combination with any other materials or in any process, 
                        unless specified in the text.</p>
                        <a href="" class="button">أضف إلى السلة</a>
                    </div>
                    </div>
                </div>
               </div>
                   
               <h2 class="title">أضف تقييم لهذا المنتج</h2>
               <div class="card review arreview" dir="rtl">
                <form>
                    <div class="form-group">
                      <label for="formGroupExampleInput">الاسم</label>
                      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="إدخل الاسم">
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput2">التقييم</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">صورة</label>
                        <input type="file" class="form-control" id="formGroupExampleInput2" placeholder="">
                      </div>
                    
                      <button type="submit" class="button">حفظ</button>
                  </form>
              </div>
              <h2 class="title">التقييمات</h2>
              <div class="feedback">
                <div class="small-container">
                    <div class="row">
                        <div class="col-3">
                            <i class="fa fa-quote-left"></i>
                            <p>good product</p>
                            <h4>lamasa</h4>
                            <h6>By ahmed</h6>
                        </div>
                    </div>
                </div>
              </div>

            <!--------------products-->
            <div class="small-container">
                <h2 class="title">المنتجات الموصى بها</h2>
                <div class="row">
                    <div class="col-4">
                        <img src="#">
                        <h4>Into the water<br></h4>
                        <p>50.00 EGP</p>
                            <a href="" class="button">أضف إلى السلة</a>
                        
                    </div>
                    <div class="col-4">
                        <img src="#">
                        <h4>Rich Dad<br></h4>
                        <p>50.00 EGP</p>
                        <a href="" class="button">أضف إلى السلة</a>
                    </div>
                    <div class="col-4">
                        <img src="HP and the chamber of secrets.jpeg">
                        <h4>The chamber of secrets<br></h4>
                        <p>50.00 EGP</p>
                        <a href="" class="button">أضف إلى السلة</a>
                    </div>
                    <div class="col-4">
                        <img src="start with why.jpg">
                        <h4>Start with why<br></h4>
                        <p>50.00 EGP</p>
                        <a href="" class="button">أضف إلى السلة</a>
                    </div>
                </div>
                
               
            </div>
        </div>
        @endsection