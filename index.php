<!DOCTYPE html>
<html lang="en">

<head>
  <title>Product Review App</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS v5.3.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
  <section>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <img src="images/latitude-5420-500x500.jpg" width="100%" alt="" />
                </div>
                <div class="col-md-8 ps-5">
                  <h4>
                    Dell Latitude 14 5420 Core i5 11th Gen 14" Full HD Laptop
                  </h4>
                  <span class="badge text-bg-secondary">Price: 80,000</span>
                  <span class="badge text-bg-secondary">Product Code: 22570</span>
                  <span class="badge text-bg-secondary">Brand: Dell</span>
                  <h5 class="mt-4">Key Features</h5>
                  <ul>
                    <li>Model: Latitude 14 5420</li>
                    <li>
                      Processor: Intel Core i5-1145G7 (8MB Cache, 2.60 GHz up
                      to 4.40 GHz)
                    </li>
                    <li>RAM: 8GB 3200MHz DDR4, Storage: 512GB SSD</li>
                    <li>Display: 14" FHD (1920x1080)</li>
                    <li>Features: Backlit keyboard, Type-C</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8 mt-5">
          <div class="card">
            <div class="card-header">Add a Review</div>
            <div class="card-body">
              <div id="response"></div>
              <div class="row">
                <form action="" id="reviewForm">
                  <input type="hidden" name="product_id" value="1" id="product_id">
                  <input type="hidden" name="user_id" value="1" id="user_id">
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label for="" class="form-label">Review Text</label>
                      <textarea name="text" id="text" rows="6" class="form-control"></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <button type="button" class="btn btn-primary" onclick="submitReview()">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

  <script>
    function submitReview() {
      const productId = document.getElementById('product_id').value;
      const userId = document.getElementById('user_id').value;
      const reviewText = document.getElementById('text').value;

      const data = {
        product_id: productId,
        user_id: userId,
        review_text: reviewText
      };

      fetch('api.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(data)
        })
        .then(response => {
          const responseDiv = document.getElementById('response');
          if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
          }
          return response.json();
        })
        .then(result => {
          const responseDiv = document.getElementById('response');
          const alertClass = result.status === 'success' ? 'alert-primary' : 'alert-danger';
          responseDiv.innerHTML = `<p class="alert ${alertClass}">Status: ${result.status}</p><p class="alert ${alertClass}">${result.message}</p>`;
          if (result.status === 'success') {
            // Reset the form
            document.getElementById('reviewForm').reset();
            setTimeout(() => {
              responseDiv.innerHTML = '';
            }, 4000);
          }
        })
        .catch(error => {
          console.error('Error:', error);
          const responseDiv = document.getElementById('response');
          responseDiv.innerHTML = `<p class="alert alert-danger">Status: Error</p><p class="alert alert-danger">An error occurred while processing your request.</p>`;
        });
    }
  </script>
</body>

</html>