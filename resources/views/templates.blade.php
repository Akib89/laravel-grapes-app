


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Template Gallery</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background-color: #f3f3f3;
    }

    .template-box {
  background-color: #fff;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  border-radius: 6px;
  overflow: hidden;
  transition: transform 0.2s ease-in-out;
  max-width: 320px;
  margin: 0 auto;
}

    .template-box:hover {
      transform: translateY(-5px);
    }

   .template-img-container {
  height: 400px;
  overflow: hidden;
  position: relative;
}

    .template-title {
  background: #e8e8e8;
  text-align: center;
  font-weight: 500;
  font-size: 18px;
  padding: 12px 0;
}

  .template-actions {
  padding: 15px;
  background: #f3f3f3;
  display: flex;
  justify-content: center;
  gap: 10px;
}
.template-actions .btn {
  flex: 1;
  font-weight: 500;
  padding: 10px 2px;   /* smaller padding */
  font-size: 10px; /* smaller font */
  margin:5px;
}

.template-img-inner {
  width: 100%;
  height: auto;
  position: absolute;
  top: 0;
  left: 0;
}


   .template-img-container:hover .template-img-inner {
  animation-name: scrollImage;
  animation-timing-function: linear;
  animation-iteration-count: infinite;
  animation-direction: alternate;
}


   @keyframes scrollImage {
  0% {
    transform: translateY(0%);
  }

  100% {
    transform: translateY(calc(-100% + 400px)); /* scroll image up, but leave container height visible */
  }
}


   
    .scroll-to-top {
      position: fixed;
      bottom: 20px;
      right: 20px;
      z-index: 1000;
    }

.single-product {
  background: #fff;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
  transition: transform 0.3s ease;
  text-align: center;
  padding: 15px;
}

.single-product:hover {
  transform: translateY(-5px);
}

.single-product .img {
  margin-bottom: 15px;
}

.single-product .img img {
  width: 100%;
  height: auto;
  border-radius: 8px;
}

.product-name h6 {
  font-size: 20px;
  font-weight: 600;
  margin-bottom: 15px;
  color: #333;
}

.product-name ul {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  justify-content: center;
  gap: 10px;
}

.product-name ul li {
  display: inline-block;
}

.btn {
  padding: 8px 18px;
  font-size: 14px;
  font-weight: 500;
  border-radius: 5px;
  text-transform: uppercase;
  transition: all 0.3s ease;
}

.btn-primary {
  background-color: #007bff;
  border: none;
  color: #fff;
}

.btn-primary:hover {
  background-color: #0056b3;
}

.btn-success {
  background-color: #28a745;
  border: none;
  color: #fff;
}

.btn-success:hover {
  background-color: #1e7e34;
}

.fa-link {
  margin-right: 6px;
}


  </style>
</head>

<body>
  <div class="container py-5">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">

      <!-- Template Blocks -->
      <div class="col">
  <div class="template-box">
    <div class="template-img-container">
     <img src="{{ asset('storage/page-images/3-piece.png') }}" alt="3 Piece" class="template-img-inner" style="animation-duration: 4s;">

    </div>
    <div class="template-title">3 Piece</div>
    <div class="template-actions d-flex justify-content-center gap-2">
      <a href="preview.php?slug=3-piece" class="btn btn-success">
        <i class="bi bi-eye"></i> Preview
      </a>
      <a href="#"
   class="btn btn-primary btn-sm custom-link"
   data-url="{{ route('builder', ['slug' => 'khejur-gur']) }}">
   <i class="bi bi-tools"></i> Customize
</a>

    </div>
  </div>
</div>

<div class="col">
  <div class="template-box">
    <div class="template-img-container">
      <img src="{{ asset('storage/page-images/allergy-cure.png') }}" alt="Allergy Cure" class="template-img-inner" style="animation-duration: 8s;">
    </div>
    <div class="template-title">Allergy Cure</div>
    <div class="template-actions d-flex justify-content-center gap-2">
      <a href="preview.php?slug=allergy-cure" class="btn btn-success">
        <i class="bi bi-eye"></i> Preview
      </a>
     <a href="#"
   class="btn btn-primary btn-sm custom-link"
   data-url="{{ route('builder', ['slug' => 'khejur-gur']) }}">
   <i class="bi bi-tools"></i> Customize
</a>

    </div>
  </div>
</div>

<div class="col">
  <div class="template-box">
    <div class="template-img-container">
      <img src="{{ asset('storage/page-images/blue-cut.png') }}" alt="Blue Cut" class="template-img-inner" style="animation-duration: 4s;">
    </div>
    <div class="template-title">Blue Cut</div>
    <div class="template-actions d-flex justify-content-center gap-2">
      <a href="preview.php?slug=blue-cut" class="btn btn-success btn-sm">
        <i class="bi bi-eye"></i> Preview
      </a>
      <a href="#"
   class="btn btn-primary btn-sm custom-link"
   data-url="{{ route('builder', ['slug' => 'khejur-gur']) }}">
   <i class="bi bi-tools"></i> Customize
</a>

    </div>
  </div>
</div>

<div class="col">
  <div class="template-box">
    <div class="template-img-container">
      <img src="{{ asset('storage/page-images/combo-pack.png') }}" alt="Combo Pack" class="template-img-inner" style="animation-duration: 4s;">
    </div>
    <div class="template-title">Combo Pack</div>
    <div class="template-actions d-flex justify-content-center gap-2">
      <a href="preview.php?slug=combo-pack" class="btn btn-success btn-sm">
        <i class="bi bi-eye"></i> Preview
      </a>
      <a href="#"
   class="btn btn-primary btn-sm custom-link"
   data-url="{{ route('builder', ['slug' => 'khejur-gur']) }}">
   <i class="bi bi-tools"></i> Customize
</a>

    </div>
  </div>
</div>

<div class="col">
  <div class="template-box">
    <div class="template-img-container">
      <img src="{{ asset('storage/page-images/jacket.png') }}" alt="Jacket" class="template-img-inner" style="animation-duration: 5s;">
    </div>
    <div class="template-title">Jacket</div>
    <div class="template-actions d-flex justify-content-center gap-2">
      <a href="preview.php?slug=jacket" class="btn btn-success btn-sm">
        <i class="bi bi-eye"></i> Preview
      </a>
      <a href="#"
   class="btn btn-primary btn-sm custom-link"
   data-url="{{ route('builder', ['slug' => 'khejur-gur']) }}">
   <i class="bi bi-tools"></i> Customize
</a>

    </div>
  </div>
</div>

<div class="col">
  <div class="template-box">
    <div class="template-img-container">
      <img src="{{ asset('storage/page-images/juta.png') }}" alt="Juta" class="template-img-inner" style="animation-duration: 4s;">
    </div>
    <div class="template-title">Juta</div>
    <div class="template-actions d-flex justify-content-center gap-2">
      <a href="preview.php?slug=juta" class="btn btn-success btn-sm">
        <i class="bi bi-eye"></i> Preview
      </a>
      <a href="#"
   class="btn btn-primary btn-sm custom-link"
   data-url="{{ route('builder', ['slug' => 'khejur-gur']) }}">
   <i class="bi bi-tools"></i> Customize
</a>

    </div>
  </div>
</div>

<div class="col">
  <div class="template-box">
    <div class="template-img-container">
      <img src="{{ asset('storage/page-images/ladies-hand-bag.png') }}" alt="Ladies Hand Bag" class="template-img-inner" style="animation-duration: 6s;">
    </div>
    <div class="template-title">Ladies Hand Bag</div>
    <div class="template-actions d-flex justify-content-center gap-2">
      <a href="preview.php?slug=ladies-hand-bag" class="btn btn-success btn-sm">
        <i class="bi bi-eye"></i> Preview
      </a>
      <a href="#"
   class="btn btn-primary btn-sm custom-link"
   data-url="{{ route('builder', ['slug' => 'khejur-gur']) }}">
   <i class="bi bi-tools"></i> Customize
</a>

    </div>
  </div>
</div>

<div class="col">
  <div class="template-box">
    <div class="template-img-container">
      <img src="{{ asset('storage/page-images/modhu.png') }}" alt="Modhu" class="template-img-inner" style="animation-duration: 4s;">
    </div>
    <div class="template-title">Modhu</div>
    <div class="template-actions d-flex justify-content-center gap-2">
      <a href="preview.php?slug=modhu" class="btn btn-success btn-sm">
        <i class="bi bi-eye"></i> Preview
      </a>
      <a href="#"
   class="btn btn-primary btn-sm custom-link"
   data-url="{{ route('builder', ['slug' => 'khejur-gur']) }}">
   <i class="bi bi-tools"></i> Customize
</a>

    </div>
  </div>
</div>

<div class="col">
  <div class="template-box">
    <div class="template-img-container">
      <img src="{{ asset('storage/page-images/perfume-bd.png') }}" alt="Perfume BD" class="template-img-inner" style="animation-duration: 6s;">
    </div>
    <div class="template-title">Perfume BD</div>
    <div class="template-actions d-flex justify-content-center gap-2">
      <a href="preview.php?slug=perfume-bd" class="btn btn-success btn-sm">
        <i class="bi bi-eye"></i> Preview
      </a>
      <a href="#"
   class="btn btn-primary btn-sm custom-link"
   data-url="{{ route('builder', ['slug' => 'khejur-gur']) }}">
   <i class="bi bi-tools"></i> Customize
</a>

    </div>
  </div>
</div>


<div class="col">
  <div class="template-box">
    <div class="template-img-container">
      <img src="{{ asset('storage/page-images/pitha.png') }}" alt="Pitha" class="template-img-inner"style="animation-duration: 4s;">
    </div>
    <div class="template-title">Pitha</div>
    <div class="template-actions d-flex justify-content-center gap-2">
      <a href="preview.php?slug=pitha" class="btn btn-success btn-sm">
        <i class="bi bi-eye"></i> Preview
      </a>
     <a href="#"
   class="btn btn-primary btn-sm custom-link"
   data-url="{{ route('builder', ['slug' => 'khejur-gur']) }}">
   <i class="bi bi-tools"></i> Customize
</a>

    </div>
  </div>
</div>

<div class="col">
  <div class="template-box">
    <div class="template-img-container">
      <img src="{{ asset('storage/page-images/polo-t-shirt.png') }}" alt="POLO T-Shirt" class="template-img-inner" style="animation-duration: 4s;">
    </div>
    <div class="template-title">POLO T-Shirt</div>
    <div class="template-actions d-flex justify-content-center gap-2">
      <a href="preview.php?slug=polo-t-shirt" class="btn btn-success btn-sm">
        <i class="bi bi-eye"></i> Preview
      </a>
      <a href="#"
   class="btn btn-primary btn-sm custom-link"
   data-url="{{ route('builder', ['slug' => 'khejur-gur']) }}">
   <i class="bi bi-tools"></i> Customize
</a>

    </div>
  </div>
</div>

<div class="col">
  <div class="template-box">
    <div class="template-img-container">
      <img src="{{ asset('storage/page-images/safety-cover.png') }}" alt="Safety Cover" class="template-img-inner" style="animation-duration: 8s;">
    </div>
    <div class="template-title">Safety Cover</div>
    <div class="template-actions d-flex justify-content-center gap-2">
      <a href="preview.php?slug=safety-cover" class="btn btn-success btn-sm custom-link">
        <i class="bi bi-eye"></i> Preview
      </a>
      <a href="#"
   class="btn btn-primary btn-sm custom-link"
   data-url="{{ route('builder', ['slug' => 'khejur-gur']) }}">
   <i class="bi bi-tools"></i> Customize
</a>

    </div>
  </div>
</div>

<div class="col">
  <div class="template-box">
    <div class="template-img-container">
      <img src="{{ asset('storage/page-images/wallet.png') }}" alt="Wallet" class="template-img-inner" style="animation-duration: 15s;">
    </div>
    <div class="template-title">Wallet</div>
    <div class="template-actions d-flex justify-content-center gap-2">
      <a href="preview.php?slug=wallet" class="btn btn-success btn-sm">
        <i class="bi bi-eye"></i> Preview
      </a>
      <a href="#"
   class="btn btn-primary btn-sm custom-link"
   data-url="{{ route('builder', ['slug' => 'khejur-gur']) }}">
   <i class="bi bi-tools"></i> Customize
</a>

    </div>
  </div>
</div>

<div class="col">
  <div class="template-box">
    <div class="template-img-container">
      <img src="{{ asset('storage/page-images/headphones.png') }}" alt="Headphones" class="template-img-inner" style="animation-duration: 10s;">
    </div>
    <div class="template-title">Headphones</div>
    <div class="template-actions d-flex justify-content-center gap-2">
      <a href="preview.php?slug=headphones" class="btn btn-success btn-sm">
        <i class="bi bi-eye"></i> Preview
      </a>
      <a href="#"
   class="btn btn-primary btn-sm custom-link"
   data-url="{{ route('builder', ['slug' => 'khejur-gur']) }}">
   <i class="bi bi-tools"></i> Customize
</a>

    </div>
  </div>
</div>

<div class="col">
  <div class="template-box">
    <div class="template-img-container">
      <img src="{{ asset('storage/page-images/khejur-gur.png') }}" alt="Khejur Gur" class="template-img-inner" style="animation-duration: 2s;">
    </div>
    <div class="template-title">Khejur Gur</div>
    <div class="template-actions d-flex justify-content-center gap-2">
      <a href="preview.php?slug=khejur-gur" class="btn btn-success btn-sm"> 
        <i class="bi bi-eye"></i> Preview
      </a>
      <a href="#"
   class="btn btn-primary btn-sm custom-link"
   data-url="{{ route('builder', ['slug' => 'khejur-gur']) }}">
   <i class="bi bi-tools"></i> Customize
</a>


    </div>
  </div>
</div>


    </div>
  </div>
  

<form method="POST" action="{{ route('logout') }}" class="position-fixed top-0 end-0 m-3">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>

 


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<script>
function generateUniqueID() {
    return Date.now().toString(36) + '-' + Math.random().toString(36).substr(2, 5);
}

document.querySelectorAll(".custom-link").forEach(function(link) {
    link.addEventListener("click", function(event) {
        event.preventDefault();
        let targetUrl = this.getAttribute("data-url");
        let uid = generateUniqueID();

        // Add UID to URL
        let separator = targetUrl.includes('?') ? '&' : '?';
        let finalUrl = targetUrl + separator + 'uid=' + uid;

        customRedirect(finalUrl);
    });
});

function customRedirect(url) {
    console.log("Redirecting to: " + url);
    window.location.href = url;
}
</script>

</body>

</html>