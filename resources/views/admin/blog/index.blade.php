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

<!-- / Content -->
@if(session()->has('message'))

<div class="alert alert-success">
    <button type="button" class="close" data-danger="alert" aria-hidden="true"> x </button>
{{ session()->get('message') }}
</div>
@endif
 <!-- Bootstrap Table with Header - Light -->
 <div class="card">
    <h5 class="card-header">სტატიები</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead class="table-light">
          <tr>
            <th>ბლოგის დასახელება</th>

            <th>სტატუსი</th>
            <th>მართვა</th>
          </tr>

        </thead>
        <tbody class="table-border-bottom-0">



@foreach ($articles as $article)

            <tr>
                <td>{{  $article->title }}</td>

                <td><span class="badge bg-label-primary me-1">აქტიური</span></td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="{{ url('edit_blog_post' , $article->id) }}"
                        ><i class="bx bx-edit-alt me-1"></i> ჩასწორება</a>
                      <a class="dropdown-item" onClick="confirm('ნამდვილად გსურთ წაშლა?')"  href="{{ url('delete_blog_post', $article->id) }}"
                        ><i class="bx bx-trash me-1"></i> წაშლა</a>
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
