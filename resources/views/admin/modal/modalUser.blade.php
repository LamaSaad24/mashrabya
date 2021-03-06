{{-- add new admin  --}}
<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header align-items-center bg-info">
          <button type="button" class="btn-close m-0 text-white opacity-100" style="background: transparent!important" data-bs-dismiss="modal" aria-label="Close">
              <i class="fas fa-times fa-1x"></i>
          </button>
          <h5 class="modal-title" id="exampleModalLabel">إضافة عنصر جديد</h5>
      </div>
      <form action="{{url('admin/admins/store')}}"   method="post" dir="rtl">
        @csrf
          <div class="modal-body bg-info">
              <div class="mb-3">
                  <label for="name" class="form-label float-end">الاسم</label>
                  <input type="text" class="form-control" value="" name="name" id="name"/>
              </div>

              <div class="mb-3">
                <label for="email" class="form-label float-end">البريد الالكتروني</label>
                <input type="email" class="form-control" value="" name="email" id="email"/>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label float-end">كلمة السر</label>
              <input type="password" class="form-control" value="" name="password" id="password"/>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label float-end">الحالة</label>
            <select class="form-select" name="active"  aria-label="Default select example">
                <option value="1">نشط </option>
                <option value="0">غير نشط</option>
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


{{-- update new admin  --}}
<div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header align-items-center bg-info">
          <button type="button" class="btn-close m-0 text-white opacity-100" style="background: transparent!important" data-bs-dismiss="modal" aria-label="Close">
              <i class="fas fa-times fa-1x"></i>
          </button>
          <h5 class="modal-title" id="exampleModalLabel"> تعديل بيانات العنصر</h5>
      </div>
      <form action="{{url('admin/admins/update')}}"  method="post"  dir="rtl">
        @csrf
          <div class="modal-body bg-info">
            <input type="hidden" name="id" id="editUser-form-id">
              <div class="modal-body bg-info">
                <div class="mb-3">
                    <label for="name" class="form-label float-end">الاسم</label>
                    <input type="text" class="form-control" name="name"id="editUser-form-name"/>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label float-end">البريد الالكتروني</label>
                  <input type="email" class="form-control" name="email" id="editUser-form-email"/>
                </div>
                <div class="mb-3">
                  <label for="active" class="form-label float-end">الحالة</label>
                  <select class="form-control" name="active" id="editUser-form-active">
                      <option value="1">نشط</option>
                      <option value="0">غير نشط</option>
                  </select>
              </div>
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

{{-- delete  admin  --}}
<div class="modal fade" id="deleteUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header align-items-center bg-info">
          <button type="button" class="btn-close m-0 text-white opacity-100" style="background: transparent!important" data-bs-dismiss="modal" aria-label="Close">
              <i class="fas fa-times fa-1x"></i>
          </button>
          <h5 class="modal-title" id="exampleModalLabel">حذف عنصر</h5>
      </div>
      <form action="{{url('admin/admins/delete')}}"  method="post" dir="rtl">
        @csrf
          <div class="modal-body bg-info">
            <p class="text-right">هل أنت متأكد من حذف العنصر ؟</p>
            <p class="text-right">سيتم حذف كل العناوين الرئيسية والفرعية والمقالات التي قام هذا العنصر باضافتها</p>
            <input type="hidden" id="userId" name="id" value="">
          </div>
          <div class="modal-footer bg-info">
            <button type="submit" class="btn btn-danger">حذف</button>
            <button type="button" class="btn btn-dark"  data-bs-dismiss="modal">إغلاق</button>
          </div>
      </form>
    </div>
  </div>
</div>

{{-- add new blogger  --}}
<div class="modal fade" id="addBlogger" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header align-items-center bg-info">
          <button type="button" class="btn-close m-0 text-white opacity-100" style="background: transparent!important" data-bs-dismiss="modal" aria-label="Close">
              <i class="fas fa-times fa-1x"></i>
          </button>
          <h5 class="modal-title" id="exampleModalLabel">إضافة عنصر جديد</h5>
      </div>
      <form action="{{url('admin/bloggers/store')}}"   method="post" dir="rtl">
        @csrf
          <div class="modal-body bg-info">
              <div class="mb-3">
                  <label for="name" class="form-label float-end">الاسم</label>
                  <input type="text" class="form-control" value="" name="name" id="name"/>
              </div>

              <div class="mb-3">
                <label for="email" class="form-label float-end">البريد الالكتروني</label>
                <input type="email" class="form-control" value="" name="email" id="email"/>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label float-end">كلمة السر</label>
              <input type="password" class="form-control" value="" name="password" id="password"/>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label float-end">الحالة</label>
            <select class="form-select" name="active"  aria-label="Default select example">
                <option value="1">نشط </option>
                <option value="0">غير نشط</option>
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


{{-- update new blogger  --}}
<div class="modal fade" id="editBlogger" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header align-items-center bg-info">
          <button type="button" class="btn-close m-0 text-white opacity-100" style="background: transparent!important" data-bs-dismiss="modal" aria-label="Close">
              <i class="fas fa-times fa-1x"></i>
          </button>
          <h5 class="modal-title" id="exampleModalLabel"> تعديل بيانات العنصر</h5>
      </div>
      <form action="{{url('admin/bloggers/update')}}"  method="post"  dir="rtl">
        @csrf
          <div class="modal-body bg-info">
            <input type="hidden" name="id" id="editBlogger-form-id">
              <div class="modal-body bg-info">
                <div class="mb-3">
                    <label for="name" class="form-label float-end">الاسم</label>
                    <input type="text" class="form-control" name="name"id="editBlogger-form-name"/>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label float-end">البريد الالكتروني</label>
                  <input type="email" class="form-control" name="email" id="editBlogger-form-email"/>
                </div>
                <div class="mb-3">
                  <label for="active" class="form-label float-end">الحالة</label>
                  <select class="form-control" name="active" id="editBlogger-form-active">
                      <option value="1">نشط</option>
                      <option value="0">غير نشط</option>
                  </select>
              </div>
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

{{-- delete  bloggers  --}}
<div class="modal fade" id="deleteBlogger" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header align-items-center bg-info">
          <button type="button" class="btn-close m-0 text-white opacity-100" style="background: transparent!important" data-bs-dismiss="modal" aria-label="Close">
              <i class="fas fa-times fa-1x"></i>
          </button>
          <h5 class="modal-title" id="exampleModalLabel">حذف عنصر</h5>
      </div>
      <form action="{{url('admin/bloggers/delete')}}"  method="post" dir="rtl">
        @csrf
          <div class="modal-body bg-info">
            <p class="text-right">هل أنت متأكد من حذف العنصر ؟</p>
            <p class="text-right">سيتم حذف كل العناوين الرئيسية والفرعية والمقالات التي قام هذا العنصر باضافتها</p>
            <input type="hidden" id="bloggerId" name="id" value="">
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