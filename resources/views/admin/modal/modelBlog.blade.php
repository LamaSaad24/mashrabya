{{-- add new Blog  --}}
<div class="modal fade" id="addBlog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header align-items-center bg-info">
            <button type="button" class="btn-close m-0 text-white opacity-100" style="background: transparent!important" data-bs-dismiss="modal" aria-label="Close">
                <i class="fas fa-times fa-1x"></i>
            </button>
            <h5 class="modal-title" id="exampleModalLabel">إضافة عنصر جديد</h5>
        </div>
        <form action="{{url('admin/blogs/store')}}"   method="post" enctype="multipart/form-data" dir="rtl">
          @csrf
            <div class="modal-body bg-info">
                <div class="mb-3">
                    <label for="title" class="form-label float-end">العنوان الرئيسي </label>
                    <input type="text" class="form-control" name="title" id="title"/>
                </div>
                <div class="mb-3">
                  <label for="content" class="form-label float-end">المحتوى</label>
                  <div style="clear: both"></div>
                  <textarea id="editor" class="form-control " name="content">
                    <h1>أبدأ بكتابة مقالتك .</h1>
                  </textarea> 
                </div>
                <div class="mb-3">
                  <label for="inputGroupFile02" class="form-label float-end">الصورة</label>
                  <input type="file" name="image" class="form-control" id="inputGroupFile02">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label float-end">النص التعريفي للصورة</label>
                  <input type="text" name="image_meta" class="form-control" id="">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label float-end">meta  keywords  </label>
                  <input type="text" name="keywords" class="form-control" id="">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label float-end"> meta description </label>
                  <input type="text" name="description" class="form-control" id="">
                </div>
                <div class="mb-3">
                  <label for="name" class="form-label float-end">الحالة</label>
                  <select class="form-select" name="active"  aria-label="Default select example">
                      <option value="1">فعالة</option>
                      <option value="0">غير فعالة</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label float-end">كلمات دلالية</label>
                    <select class="form-select" name="tags[]" multiple="multiple" id="tags">
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label float-end">العنوان الفرعي</label>
                    <select class="form-select" name="subCatId" id="subCats">
                    @foreach ($subCats as $subCat)
                        <option value="{{$subCat->subCatId}}" title="{{$subCat->title}}">{{$subCat->subCatName}}</option>
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



{{-- delete  Blog  --}}
<div class="modal fade" id="deleteBlog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header align-items-center bg-info">
            <button type="button" class="btn-close m-0 text-white opacity-100" style="background: transparent!important" data-bs-dismiss="modal" aria-label="Close">
                <i class="fas fa-times fa-1x"></i>
            </button>
            <h5 class="modal-title" id="exampleModalLabel">حذف عنصر</h5>
        </div>
        <form action="{{url('admin/blogs/delete')}}"  method="post" dir="rtl">
          @csrf
            <div class="modal-body bg-info">
              <p class="text-right">هل أنت متأكد من حذف العنصر ؟</p>
              <input type="hidden" id="blogId" name="id" value="">
            </div>
            <div class="modal-footer bg-info">
              <button type="submit" class="btn btn-danger">حذف</button>
              <button type="button" class="btn btn-dark"  data-bs-dismiss="modal">إغلاق</button>
            </div>
        </form>
      </div>
    </div>
</div>

{{-- update Blog --}}
<div class="modal fade" id="editBlog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header align-items-center bg-info">
          <button type="button" class="btn-close m-0 text-white opacity-100" style="background: transparent!important" data-bs-dismiss="modal" aria-label="Close">
              <i class="fas fa-times fa-1x"></i>
          </button>
          <h5 class="modal-title" id="exampleModalLabel"> تعديل بيانات العنصر</h5>
      </div>
      <form action="{{url('admin/blogs/update')}}"  method="post" enctype="multipart/form-data" dir="rtl">
        @csrf
          <div class="modal-body bg-info">
            <input type="hidden" name="id" id="editBlog-form-id">
              <div class="mb-3">
                  <label for="editBlog-form-title" class="form-label float-end">العنوان</label>
                  <input type="text" class="form-control" name="title" id="editBlog-form-title"/>
              </div>
              <div class="mb-3">
                <label for="editEditor" class="form-label float-end">المحتوى</label>
                  <div style="clear: both"></div>
                  <textarea id="editEditor" class="form-control editor" name="content">
                  </textarea> 
              </div>
              <div class="mb-3">
                <label for="inputGroupFile02" class="form-label float-end">الصورة</label>
                <img  alt="" id="editBlog-form-image" class="d-block mx-auto my-2" style="height: 100px">
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
                <label for="editBlog-form-active" class="form-label float-end">الحالة</label>
                <select class="form-control" name="active" id="editBlog-form-active">
                  <option value="0">غير فعالة</option>
                  <option value="1">فعالة</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="editBlog-form-tags" class="form-label float-end">كلمات دلالية</label>
                <select class="form-select" name="tags[]" multiple="multiple" id="editBlog-form-tags">
                </select>
            </div>
            <div class="mb-3">
                <label for="editBlog-form-subCats" class="form-label float-end">العنوان الفرعي</label>
                <select class="form-select" name="subCatId" id="editBlog-form-subCats">
                @foreach ($subCats as $subCat)
                    <option value="{{$subCat->subCatId}}" title="{{$subCat->title}}">{{$subCat->subCatName}}</option>
                @endforeach
                </select>
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