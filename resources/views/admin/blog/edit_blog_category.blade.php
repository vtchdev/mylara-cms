@include('admin.head')

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        @include('admin.sidebar')

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
            @include('admin.navbar')

          <!-- Content wrapper -->
          <div class="content-wrapper">
           <!-- Content -->
           <div class="container-xxl flex-grow-1 container-p-y">
  <!-- Basic Layout -->
  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        @if(session()->has('message'))

        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> X </button>
        {{ session()->get('message') }}
        </div>
    @endif

        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">კატეგორიის დამატება</h5>
        </div>
        <div class="card-body">
          <form action="{{ url('edit_blog_category_confirm' , $blog_category_update->id) }}" method="POST">
@csrf
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">კატეგორიის დასახელება</label>
              <input type="text" name="name" class="form-control" id="basic-default-fullname" value="{{ $blog_category_update->name }}" />
            </div>



          </form>

          <button type="submit" class="btn btn-success">კატეგორიის განახლება</button>
          <a  href="{{ url('blog/category') }}" type="button"  class="btn btn-primary">ახალი კატეგორიის დამატება</a>

        </div>
      </div>
    </div>


</div>
<!-- / Content -->

 <!-- Bootstrap Table with Header - Light -->
 <div class="card">
    <h5 class="card-header">კატეგორიები</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead class="table-light">
          <tr>
            <th>კატეგორიის დასახელება</th>
            <th>სტატუსი</th>
            <th>მართვა</th>
          </tr>

        </thead>
        <tbody class="table-border-bottom-0">

            @foreach ($blog_categories as $blog_category)


            <tr>
                <td>{{ $blog_category->name }}</td>

                <td><span class="badge bg-label-primary me-1">აქტიური</span></td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="{{ url('edit_blog_category' , $blog_category->id ) }}"
                        ><i class="bx bx-edit-alt me-1"></i> ჩასწორება</a
                      >
                      <a class="dropdown-item" onClick="confirm('ნამდვილად გსურთ წაშლა?')"  href="{{ url('delete_blog_category' , $blog_category->id) }}"
                        ><i class="bx bx-trash me-1"></i> წაშლა</a
                      >
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!-- Bootstrap Table with Header - Light -->


           </div>
          @include('admin.footer')
  </body>
</html>
