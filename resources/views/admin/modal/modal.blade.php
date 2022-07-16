{{-- add new main cat  --}}
<div class="modal fade" id="addMainCat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header align-items-center bg-info">
          <button type="button" class="btn-close m-0 text-white opacity-100" style="background: transparent!important" data-bs-dismiss="modal" aria-label="Close">
              <i class="fas fa-times fa-1x"></i>
          </button>
          <h5 class="modal-title" id="exampleModalLabel">إضافة عنصر جديد</h5>
      </div>
      <form action="{{url('admin/mainCats/store')}}" enctype="multipart/form-data"  method="post" dir="rtl">
        @csrf
          <div class="modal-body bg-info">
              <div class="mb-3">
                  <label for="value" class="form-label float-end">الاسم</label>
                  <input type="text" class="form-control" name="name" id="value"/>
              </div>
              <div class="mb-3">
                <label for="inputGroupFile02" class="form-label float-end">الصورة</label>
                <input type="file" name="image" class="form-control" id="inputGroupFile02">
              </div>
              <div class="mb-3">
                <label for="editBlog-form-image_meta" class="form-label float-end">النص التعريفي للصورة</label>
                <input type="text" class="form-control" name="image_meta" id="editBlog-form-image_meta"/>
              </div>
              <div class="mb-3">
                <label for="editBlog-form-keywords_meta" class="form-label float-end"> keywords meta</label>
                <input type="text" class="form-control" name="keywords" id="editBlog-form-keywords_meta"/>
              </div>
              <div class="mb-3">
                <label for="editBlog-form-description_meta" class="form-label float-end"> description meta</label>
                <input type="text" class="form-control" name="description" id="editBlog-form-description_meta"/>
              </div>
              <div class="mb-3">
                <label for="name" class="form-label float-end">الحالة</label>
                <select class="form-select" name="active"  aria-label="Default select example">
                    <option value="1">فعالة</option>
                    <option value="0">غير فعالة</option>
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


{{-- update new main cat  --}}
<div class="modal fade" id="editMainCat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header align-items-center bg-info">
          <button type="button" class="btn-close m-0 text-white opacity-100" style="background: transparent!important" data-bs-dismiss="modal" aria-label="Close">
              <i class="fas fa-times fa-1x"></i>
          </button>
          <h5 class="modal-title" id="exampleModalLabel"> تعديل بيانات العنصر</h5>
      </div>
      <form action="{{url('admin/mainCats/update')}}"  method="post" enctype="multipart/form-data" dir="rtl">
        @csrf
          <div class="modal-body bg-info">
            <input type="hidden" name="id" id="editMainCat-form-id">
              <div class="mb-3">
                  <label for="value" class="form-label float-end">الاسم</label>
                  <input type="text" class="form-control" name="name" id="editMainCat-form-name"/>
              </div>
              <div class="mb-3">
                <label for="value" class="form-label float-end">الحالة</label>
                <select class="form-control" name="active" id="editMainCat-form-active">
                  <option value="0">غير فعالة</option>
                  <option value="1">فعالة</option>
                </select>
            </div>
            <div class="mb-3">
              <label for="inputGroupFile02" class="form-label float-end">الصورة</label>
              <img  alt="main cat image" id="editMainCat-form-image" class="d-block mx-auto my-2" style="height: 100px">
              <input type="file" name="image" class="form-control" id="inputGroupFile02">
          </div>
          <div class="mb-3">
            <label for="" class="form-label float-end">النص التعريفي للصورة</label>
            <input type="text" class="form-control" name="image_meta" id="editMainCat-form-image_meta"/>
          </div>
          <div class="mb-3">
            <label for="" class="form-label float-end"> keywords meta</label>
            <input type="text" class="form-control" name="keywords" id="editMainCat-form-keywords"/>
          </div>
          <div class="mb-3">
            <label for="" class="form-label float-end"> description meta</label>
            <input type="text" class="form-control" name="description" id="editMainCat-form-description"/>
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

{{-- delete  main cat  --}}
<div class="modal fade" id="deleteMainCat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header align-items-center bg-info">
          <button type="button" class="btn-close m-0 text-white opacity-100" style="background: transparent!important" data-bs-dismiss="modal" aria-label="Close">
              <i class="fas fa-times fa-1x"></i>
          </button>
          <h5 class="modal-title" id="exampleModalLabel">حذف عنصر</h5>
      </div>
      <form action="{{url('admin/mainCats/delete')}}"  method="post" dir="rtl">
        @csrf
          <div class="modal-body bg-info">
            <p class="text-right">هل أنت متأكد من حذف العنصر ؟</p>
            <p class="text-right">سيتم  حذف كل العناوين الفرعية والمقالات التابعة لهذا العنوان الرئيسي</p>
            <p class="text-right">إذا لا تريد ذلك يمكننك تحويل الحالة لغير فعالة , سيتم حينها تجاهل عرضه للمستخدمين</p>
            <input type="hidden" id="mainId" name="id" value="">
          </div>
          <div class="modal-footer bg-info">
            <button type="submit" class="btn btn-danger">حذف العنصر وكل العناوين والمقالات التابعة</button>
            <button type="button" class="btn btn-dark"  data-bs-dismiss="modal">إغلاق</button>
          </div>
      </form>
    </div>
  </div>
</div>



{{-- add new sub cat  --}}
<div class="modal fade" id="addSubCat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header align-items-center bg-info">
          <button type="button" class="btn-close m-0 text-white opacity-100" style="background: transparent!important" data-bs-dismiss="modal" aria-label="Close">
              <i class="fas fa-times fa-1x"></i>
          </button>
          <h5 class="modal-title" id="exampleModalLabel">إضافة عنصر جديد</h5>
      </div>
      <form action="{{url('admin/subCats/store')}}" enctype="multipart/form-data"  method="post" dir="rtl">
        @csrf
          <div class="modal-body bg-info">
              <div class="mb-3">
                  <label for="value" class="form-label float-end">الاسم</label>
                  <input type="text" class="form-control" name="name" id="value"/>
              </div>
              <div class="mb-3">
                <label for="inputGroupFile02" class="form-label float-end">الصورة</label>
                <input type="file" name="image" class="form-control" id="inputGroupFile02">
              </div>
              <div class="mb-3">
                <label for="editBlog-form-image_meta" class="form-label float-end">النص التعريفي للصورة</label>
                <input type="text" class="form-control" name="image_meta" id="editBlog-form-image_meta"/>
              </div>
              <div class="mb-3">
                <label for="editBlog-form-keywords_meta" class="form-label float-end"> keywords meta</label>
                <input type="text" class="form-control" name="keywords" id="editBlog-form-keywords_meta"/>
              </div>
              <div class="mb-3">
                <label for="editBlog-form-description_meta" class="form-label float-end"> description meta</label>
                <input type="text" class="form-control" name="description" id="editBlog-form-description_meta"/>
              </div>
              <div class="mb-3">
                <label for="name" class="form-label float-end">الحالة</label>
                <select class="form-select" name="active"  aria-label="Default select example">
                    <option value="1">فعالة</option>
                    <option value="0">غير فعالة</option>
                  </select>
            </div>
            <div class="mb-3">
              <label for="value" class="form-label float-end">العنوان الرئيسي</label>
              <select class="form-control" name="mainCatId" id="editSubCat-form-mainCat">
                @foreach ($mainCats as $mainCat)
                  <option value="{{$mainCat->id}}">{{$mainCat->name}}</option>
                @endforeach
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


{{-- update new sub cat  --}}
<div class="modal fade" id="editSubCat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header align-items-center bg-info">
          <button type="button" class="btn-close m-0 text-white opacity-100" style="background: transparent!important" data-bs-dismiss="modal" aria-label="Close">
              <i class="fas fa-times fa-1x"></i>
          </button>
          <h5 class="modal-title" id="exampleModalLabel"> تعديل بيانات العنصر</h5>
      </div>
      <form action="{{url('admin/subCats/update')}}"  method="post" enctype="multipart/form-data" dir="rtl">
        @csrf
          <div class="modal-body bg-info">
            <input type="hidden" name="id" id="editSubCat-form-id">
              <div class="mb-3">
                  <label for="value" class="form-label float-end">الاسم</label>
                  <input type="text" class="form-control" name="name" id="editSubCat-form-name"/>
              </div>
              <div class="mb-3">
                  <label for="value" class="form-label float-end">الحالة</label>
                  <select class="form-control" name="active" id="editSubCat-form-active">
                    <option value="0">غير فعالة</option>
                    <option value="1">فعالة</option>
                  </select>
              </div>
              <div class="mb-3">
                <label for="value" class="form-label float-end">العنوان الرئيسي</label>
                <select class="form-control" name="mainCatId" id="editSubCat-form-mainCat">
                  @foreach ($mainCats as $mainCat)
                    <option value="{{$mainCat->id}}">{{$mainCat->name}}</option>
                  @endforeach
                </select>
            </div>
              <div class="mb-3">
                <label for="inputGroupFile02" class="form-label float-end">الصورة</label>
                <img  alt="sub cat image" id="editSubCat-form-image" class="d-block mx-auto my-2" style="height: 100px">
                <input type="file" name="image" class="form-control" id="inputGroupFile02">
            </div>
            <div class="mb-3">
              <label for="" class="form-label float-end">النص التعريفي للصورة</label>
              <input type="text" class="form-control" name="image_meta" id="editSubCat-form-image_meta"/>
            </div>
            <div class="mb-3">
              <label for="" class="form-label float-end"> keywords meta</label>
              <input type="text" class="form-control" name="keywords" id="editSubCat-form-keywords"/>
            </div>
            <div class="mb-3">
              <label for="" class="form-label float-end"> description meta</label>
              <input type="text" class="form-control" name="description" id="editSubCat-form-description"/>
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

{{-- delete  sub cat  --}}
<div class="modal fade" id="deleteSubCat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header align-items-center bg-info">
          <button type="button" class="btn-close m-0 text-white opacity-100" style="background: transparent!important" data-bs-dismiss="modal" aria-label="Close">
              <i class="fas fa-times fa-1x"></i>
          </button>
          <h5 class="modal-title" id="exampleModalLabel">حذف عنصر</h5>
      </div>
      <form action="{{url('admin/subCats/delete')}}"  method="post" dir="rtl">
        @csrf
          <div class="modal-body bg-info">
            <p class="text-right">هل أنت متأكد من حذف العنصر ؟</p>
            <input type="hidden" id="subId" name="id" value="">
          </div>
          <div class="modal-footer bg-info">
            <button type="submit" class="btn btn-danger">حذف</button>
            <button type="button" class="btn btn-dark"  data-bs-dismiss="modal">إغلاق</button>
          </div>
      </form>
    </div>
  </div>
</div>





@section('scripts')
      <script>
        // select style  
        $('.social').selectpicker();
      </script>
@endsection