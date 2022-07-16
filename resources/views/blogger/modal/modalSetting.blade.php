{{-- add new setting  --}}
<div class="modal fade" id="addSetting" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header align-items-center bg-info">
            <button type="button" class="btn-close m-0 text-white opacity-100" style="background: transparent!important" data-bs-dismiss="modal" aria-label="Close">
                <i class="fas fa-times fa-1x"></i>
            </button>
            <h5 class="modal-title" id="exampleModalLabel">إضافة عنصر جديد</h5>
        </div>
        <form action="{{url('dashboard/settings/store')}}"  method="post" dir="rtl">
          @csrf
            <div class="modal-body bg-info">
                <div class="mb-3">
                    <label for="name" class="form-label float-end">الاسم</label>
                    <select class="form-select" name="name"  aria-label="Default select example">
                        <option selected hidden value="">اختار اسم الاعداد</option>
                        <option value="facebook">فيسبوك</option>
                        <option value="whatsapp">واتس اب</option>
                        <option value="twitter">تويتر</option>
                        <option value="google">جوجل</option>
                        <option value="youtube">يوتيوب</option>
                        <option value="instagram">انستغرام</option>
                        <option value="whatsapp">واتساب</option>
                        <option value="android">تطبيق اندرويد</option>
                        <option value="snapchat">سناب شات</option>
                      </select>
                </div>
                <div class="mb-3">
                    <label for="value" class="form-label float-end">القيمة</label>
                    <input type="text" class="form-control" name="value" id="value"/>
                </div>
                <div class="mb-3">
                  <label for="name" class="form-label float-end">الأيقونة</label>
                  <select class="form-select fab fw-bold" name="icon" >
                      <option selected hidden value="" >اختار الأيقونة </option>
                      <option class="fab" value="fab fa-facebook">&#xf39e;</option>
                      <option class="fab" value="fab fa-whatsapp">&#xf232;</option>
                      <option class="fab" value="fab fa-twitter">&#xf099;</option>
                      <option class="fab" value="fab fa-google">&#xf1a0;</option>
                      <option class="fab" value="fab fa-youtube">&#xf167;</option>
                      <option class="fab" value="fab fa-Instagram">&#xf16d;</option>
                      <option class="fab" value="fab fa-whatsapp">&#xf232;</option>
                      <option class="fab" value="fab fa-android"> &#xf17b;</option>
                      <option class="fab" value="fab fa-snapchat"> &#xf2ab;</option>
                    </select>
              </div>
            </div>
            <div class="modal-footer bg-info">
              <button type="submit" class="btn btn-light">إضافة</button>
              <button type="button" class="btn btn-dark" data-bs-dismiss="modal">إغلاق</button>
            </div>
        </form>
      </div>
    </div>
</div>


{{-- update new setting  --}}
<div class="modal fade" id="editSetting" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header align-items-center bg-info">
          <button type="button" class="btn-close m-0 text-white opacity-100" style="background: transparent!important" data-bs-dismiss="modal" aria-label="Close">
              <i class="fas fa-times fa-1x"></i>
          </button>
          <h5 class="modal-title" id="exampleModalLabel"> تعديل بيانات العنصر</h5>
      </div>
      <form action="{{url('dashboard/settings/update')}}"  method="post" dir="rtl">
        @csrf
          <div class="modal-body bg-info">
            <input type="hidden" name="id" id="editSetting-form-id">
              <div class="mb-3">
                  <label for="value" class="form-label float-end">القيمة</label>
                  <input type="text" class="form-control" name="value" id="editSetting-form-value"/>
              </div>
          </div>
          <div class="modal-footer bg-info">
            <button type="submit" class="btn btn-light">تحديث</button>
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">إغلاق</button>
          </div>
      </form>
    </div>
  </div>
</div>

{{-- delete  setting  --}}
<div class="modal fade" id="deleteSetting" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header align-items-center bg-info">
          <button type="button" class="btn-close m-0 text-white opacity-100" style="background: transparent!important" data-bs-dismiss="modal" aria-label="Close">
              <i class="fas fa-times fa-1x"></i>
          </button>
          <h5 class="modal-title" id="exampleModalLabel">حذف عنصر</h5>
      </div>
      <form action="{{url('dashboard/settings/delete')}}"  method="post" dir="rtl">
        @csrf
          <div class="modal-body bg-info">
            <p class="text-right">هل أنت متأكد من حذف العنصر ؟</p>
            <input type="hidden" id="settingId" name="id" value="">
          </div>
          <div class="modal-footer bg-info">
            <button type="submit" class="btn btn-danger">حذف</button>
            <button type="button" class="btn btn-dark"  data-bs-dismiss="modal">إغلاق</button>
          </div>
      </form>
    </div>
  </div>
</div>


{{-- add meta  --}}
<div class="modal fade" id="addSeo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header align-items-center bg-info">
          <button type="button" class="btn-close m-0 text-white opacity-100" style="background: transparent!important" data-bs-dismiss="modal" aria-label="Close">
              <i class="fas fa-times fa-1x"></i>
          </button>
          <h5 class="modal-title" id="exampleModalLabel">إضافة عنصر جديد</h5>
      </div>
      <form action="{{url('dashboard/seo/storeSeo')}}"  method="post" dir="rtl">
        @csrf
          <div class="modal-body bg-info">
              <div class="mb-3">
                  <label for="name" class="form-label float-end">اسم الصفحة</label>
                  <select class="form-select" name="key"  aria-label="Default select example">
                      <option selected hidden value="">اختار اسم الصفحة</option>
                      <option value="home">الصفحة الرئيسية</option>
                      <option value="lastBlog">أحدث المواضيع </option>
                    </select>
              </div>
              <div class="mb-3">
                <label for="title" class="form-label float-end">title</label>
                <input type="text" class="form-control" name="title" id="title"/>
            </div>
              <div class="mb-3">
                  <label for="keywords" class="form-label float-end">keywords</label>
                  <input type="text" class="form-control" name="keywords" id="keywords"/>
              </div>
              <div class="mb-3">
                <label for="description" class="form-label float-end">description</label>
                <input type="text" class="form-control" name="description" id="description"/>
              </div>
            
          </div>
          <div class="modal-footer bg-info">
            <button type="submit" class="btn btn-light">إضافة</button>
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">إغلاق</button>
          </div>
      </form>
    </div>
  </div>
</div>


{{-- update meta  --}}
<div class="modal fade" id="editSeo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header align-items-center bg-info">
        <button type="button" class="btn-close m-0 text-white opacity-100" style="background: transparent!important" data-bs-dismiss="modal" aria-label="Close">
            <i class="fas fa-times fa-1x"></i>
        </button>
        <h5 class="modal-title" id="exampleModalLabel"> تعديل بيانات العنصر</h5>
    </div>
    <form action="{{url('dashboard/seo/updateSeo')}}"  method="post" dir="rtl">
      @csrf
        <div class="modal-body bg-info">
          <input type="hidden" name="id" id="editSeo-form-id">
          <div class="mb-3">
            <label for="editSeo-form-title" class="form-label float-end">title</label>
            <input type="text" class="form-control" name="title" id="editSeo-form-title"/>
          </div>
            <div class="mb-3">
              <label for="keywords" class="form-label float-end">keywords</label>
              <input type="text" class="form-control" name="keywords" id="editSeo-form-keywords"/>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label float-end">description</label>
            <input type="text" class="form-control" name="description" id="editSeo-form-description"/>
        </div>
        </div>
        <div class="modal-footer bg-info">
          <button type="submit" class="btn btn-light">تحديث</button>
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">إغلاق</button>
        </div>
    </form>
  </div>
</div>
</div>

{{-- delete  meta  --}}
<div class="modal fade" id="deleteSeo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header align-items-center bg-info">
        <button type="button" class="btn-close m-0 text-white opacity-100" style="background: transparent!important" data-bs-dismiss="modal" aria-label="Close">
            <i class="fas fa-times fa-1x"></i>
        </button>
        <h5 class="modal-title" id="exampleModalLabel">حذف عنصر</h5>
    </div>
    <form action="{{url('dashboard/seo/deleteSeo')}}"  method="post" dir="rtl">
      @csrf
        <div class="modal-body bg-info">
          <p class="text-right">هل أنت متأكد من حذف العنصر ؟</p>
          <input type="hidden" id="seoId" name="id" value="">
        </div>
        <div class="modal-footer bg-info">
          <button type="submit" class="btn btn-danger">حذف</button>
          <button type="button" class="btn btn-dark"  data-bs-dismiss="modal">إغلاق</button>
        </div>
    </form>
  </div>
</div>
</div>



{{-- home settings  --}}
{{-- add new setting  --}}
<div class="modal fade" id="addHomeSetting" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header align-items-center bg-info">
          <button type="button" class="btn-close m-0 text-white opacity-100" style="background: transparent!important" data-bs-dismiss="modal" aria-label="Close">
              <i class="fas fa-times fa-1x"></i>
          </button>
          <h5 class="modal-title" id="exampleModalLabel">إضافة عنصر جديد</h5>
      </div>
      <form action="{{url('dashboard/settings/storeHomeSetting')}}" enctype="multipart/form-data"  method="post" dir="rtl">
        @csrf
          <div class="modal-body bg-info">
              <div class="mb-3">
                  <label for="" class="form-label float-end">العنوان الرئيسي </label>
                  <input type="text" class="form-control" name="title" id=""/>
              </div>
              <div class="mb-3">
                <label for="inputGroupFile02" class="form-label float-end">الصورة في الصفحة الرئيسية</label>
                <input type="file" name="image" class="form-control" id="inputGroupFile02">
              </div>
              <div class="mb-3">
                <label for="inputGroupFile02" class="form-label float-end">لوغو</label>
                <input type="file" name="logo" class="form-control" id="inputGroupFile02">
              </div>
              <div class="mb-3">
                <label for="inputGroupFile02" class="form-label float-end">أيقونة الموقع</label>
                <input type="file" name="icon" class="form-control" id="inputGroupFile02">
              </div>
          </div>
          <div class="modal-footer bg-info">
            <button type="submit" class="btn btn-light">إضافة</button>
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">إغلاق</button>
          </div>
      </form>
    </div>
  </div>
</div>

{{-- delete  Home Setting  --}}
<div class="modal fade" id="deleteHomeSetting" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header align-items-center bg-info">
          <button type="button" class="btn-close m-0 text-white opacity-100" style="background: transparent!important" data-bs-dismiss="modal" aria-label="Close">
              <i class="fas fa-times fa-1x"></i>
          </button>
          <h5 class="modal-title" id="exampleModalLabel">حذف عنصر</h5>
      </div>
      <form action="{{url('dashboard/settings/deleteHomeSetting')}}"  method="post" dir="rtl">
        @csrf
          <div class="modal-body bg-info">
            <p class="text-right">هل أنت متأكد من حذف العنصر ؟</p>
            <input type="hidden" id="homeSettingId" name="id" value="">
          </div>
          <div class="modal-footer bg-info">
            <button type="submit" class="btn btn-danger">حذف</button>
            <button type="button" class="btn btn-dark"  data-bs-dismiss="modal">إغلاق</button>
          </div>
      </form>
    </div>
  </div>
</div>

{{-- update  Home Setting   --}}
<div class="modal fade" id="editHomeSetting" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header align-items-center bg-info">
          <button type="button" class="btn-close m-0 text-white opacity-100" style="background: transparent!important" data-bs-dismiss="modal" aria-label="Close">
              <i class="fas fa-times fa-1x"></i>
          </button>
          <h5 class="modal-title" id="exampleModalLabel"> تعديل بيانات العنصر</h5>
      </div>
      <form action="{{url('dashboard/settings/updateHomeSetting')}}"  method="post" enctype="multipart/form-data" dir="rtl">
        @csrf
          <div class="modal-body bg-info">
            <input type="hidden" name="id" id="editHomeSetting-form-id">
            <div class="mb-3">
              <label for="editSeo-form-title" class="form-label float-end">title</label>
              <input type="text" class="form-control" name="title" id="editHomeSetting-form-title"/>
            </div>
            <div class="mb-3">
              <label for="inputGroupFile02" class="form-label float-end">الصورة</label>
              <img  alt="" id="editHomeSetting-form-image" class="d-block mx-auto my-2" style="height: 100px">
              <input type="file" name="image" class="form-control" id="inputGroupFile02">
            </div>
            <div class="mb-3">
              <label for="inputGroupFile02" class="form-label float-end">لوغو</label>
              <img  alt="" id="editHomeSetting-form-logo" class="d-block mx-auto my-2" style="height: 100px">
              <input type="file" name="logo" class="form-control" id="inputGroupFile02">
            </div>
            <div class="mb-3">
              <label for="inputGroupFile02" class="form-label float-end">أيقونة</label>
              <img  alt="" id="editHomeSetting-form-icon" class="d-block mx-auto my-2" style="height: 100px">
              <input type="file" name="icon" class="form-control" id="inputGroupFile02">
            </div>
          </div>
          <div class="modal-footer bg-info">
            <button type="submit" class="btn btn-light">تحديث</button>
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">إغلاق</button>
          </div>
      </form>
    </div>
  </div>
  </div>