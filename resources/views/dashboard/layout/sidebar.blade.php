<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-danger">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none mt-5">
            <i class="bi bi-bag text-white"></i><span class="fs-5 d-none d-sm-inline">  SIMS Web App</span>
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li class="nav-item">
                <a href="/produk" class="nav-link align-middle px-0 text-white">
                    <i class="bi bi-box-seam"></i> <span class="ms-1 d-none d-sm-inline">Produk</span>
                </a>
            </li>
            <li>
                <a href="/profil" class="nav-link px-0 align-middle text-white">
                    <i class="bi bi-person"></i> <span class="ms-1 d-none d-sm-inline">Profile</span></a>
            </li>
            <li><form action="/logout" method="POST">
                @csrf
                <button class="nav-link px-0 align-middle text-white" type="submit">
                    <i class="bi bi-box-arrow-right"></i> <span class="ms-1 d-none d-sm-inline">Logout</span>
                </button>
            </form>
            </li>
        </ul>
    </div>
</div>