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
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">სტატიის დამატება</h5>
          <small class="text-muted float-end">ბლოგი</small>
        </div>
        <div class="card-body">
          <form>

            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">სტატიის დასახელება</label>
              <input type="text" name="title" class="form-control" id="basic-default-fullname" placeholder="სტატიის დასახელება" />
            </div>
            <div class="mb-3">
              <label for="exampleFormControlSelect1" class="form-label">კატეგორია</label>
              <select class="form-select" name="category" id="exampleFormControlSelect1" aria-label="კატეგორიის არჩევა" >
              
                @foreach ($blog_category as $blog_category)
                  
              
                <option value="{{ $blog_category->name }}">{{ $blog_category->name }}</option>
                @endforeach
              </select>
            </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">სტატიის დასახელება</label>
                <input type="text" name="title" class="form-control" id="basic-default-fullname" placeholder="სტატიის დასახელება" />
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">სტატიის დასახელება</label>
                <input type="text" name="title" class="form-control" id="basic-default-fullname" placeholder="სტატიის დასახელება" />
              </div>
           

            <div class="mb-3">
              <label class="form-label" for="basic-default-message">META აღწერა</label>
              <textarea
                id="basic-default-message"
                class="form-control"
                placeholder="Hi, Do you have a moment to talk Joe?"
              ></textarea>
            </div>

            <div class="mb-3">
              <label for="formFileMultiple" class="form-label">Multiple files input example</label>
              <input class="form-control" type="file" id="formFileMultiple" multiple />
            </div>



            <button type="submit" class="btn btn-primary">დამატება</button>
          </form>
        </div>
      </div>
    </div>
    
    
</div>
<!-- / Content -->

           </div>
          @include('admin.footer')
  </body>
</html>
