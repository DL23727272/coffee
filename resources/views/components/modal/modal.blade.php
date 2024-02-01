@section('modal')


<!-- Modal 1-->
<div class="modal fade" id="coffee1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Caffe Latte</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Name Input -->
                <div class="mb-3">
                    <label for="name1" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name1" name="name" placeholder="Enter your name" required>
                </div>

                <!-- Size Options -->
                <div class="mb-3">
                    <label for="size1" class="form-label">Size:</label>
                    <select class="form-select" id="size1" name="size">
                        <option value="venti" data-price="105">Venti - 105</option>
                        <option value="grande" data-price="90">Grande - 90</option>
                    </select>
                </div>

                <!-- Temperature Options -->
                <div class="mb-3">
                    <label for="temperature1" class="form-label">Temperature:</label>
                    <select class="form-select" id="temperature1" name="temperature">
                        <option value="iced">Iced</option>
                        <option value="hot">Hot</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="addToCart('Caffe Latte', 'name1', 'size1', 'temperature1')">Add to cart</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal 2-->
<div class="modal fade" id="coffee2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cappuccino</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Name Input -->
                <div class="mb-3">
                    <label for="name2" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name2" name="name" placeholder="Unavailable" disabled>
                </div>

                <!-- Size Options -->
                <div class="mb-3">
                    <label for="size2" class="form-label">Size:</label>
                    <select class="form-select" id="size2" name="size" disabled>
                        <option value="venti" data-price="105">Venti - 105</option>
                        <option value="grande" data-price="90">Grande - 90</option>
                    </select>
                </div>

                <!-- Temperature Options -->
                <div class="mb-3">
                    <label for="temperature2" class="form-label">Temperature:</label>
                    <select class="form-select" id="temperature2" name="temperature" disabled>
                        <option value="iced">Iced</option>
                        <option value="hot">Hot</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="addToCart('Cappuccino', 'name2', 'size2', 'temperature2')">Add to cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal 3-->
<div class="modal fade" id="coffee3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Spanish Latte</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <!-- Name Input -->
            <div class="mb-3">
                <label for="name3" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name3" name="name" placeholder="Enter your name" required>
            </div>

            <!-- Size Options -->
            <div class="mb-3">
                <label for="size3" class="form-label">Size:</label>
                <select class="form-select" id="size3" name="size">
                    <option value="venti" data-price="125">Venti - 125</option>
                    <option value="grande" data-price="110">Grande - 110</option>
                </select>
            </div>

            <!-- Temperature Options -->
            <div class="mb-3">
                <label for="temperature3" class="form-label">Temperature:</label>
                <select class="form-select" id="temperature3" name="temperature">
                    <option value="iced">Iced</option>
                    <option value="hot">Hot</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="addToCart('Spanish Latte', 'name3', 'size3', 'temperature3')">Add to cart</button>
        </div>
    </div>
  </div>
</div>



<!-- Modal 4-->
<div class="modal fade" id="coffee4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Americano</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <!-- Name Input -->
            <div class="mb-3">
                <label for="name4" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name4" name="name" placeholder="Enter your name" required>
            </div>

            <!-- Size Options -->
            <div class="mb-3">
                <label for="size4" class="form-label">Size:</label>
                <select class="form-select" id="size4" name="size">
                     <option value="venti" data-price="105">Venti - 105</option>
                     <option value="grande" data-price="90">Grande - 90</option>
                </select>
            </div>

            <!-- Temperature Options -->
            <div class="mb-3">
                <label for="temperature4" class="form-label">Temperature:</label>
                <select class="form-select" id="temperature4" name="temperature">
                    <option value="iced">Iced</option>
                    <option value="hot">Hot</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="addToCart('Americano', 'name4', 'size4', 'temperature4')">Add to cart</button>
        </div>
    </div>
  </div>
</div>

<!-- Modal 5-->
<div class="modal fade" id="coffee5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" required>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Caramel Macchiato</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <!-- Name Input -->
            <div class="mb-3">
                <label for="name5" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name5" name="name" placeholder="Enter your name">
            </div>

            <!-- Size Options -->
            <div class="mb-3">
                <label for="size5" class="form-label">Size:</label>
                <select class="form-select" id="size5" name="size">
                    <option value="venti" data-price="140">Venti - 140</option>
                    <option value="grande" data-price="155">Grande - 155</option>
                </select>
            </div>

            <!-- Temperature Options -->
            <div class="mb-3">
                <label for="temperature5" class="form-label">Temperature:</label>
                <select class="form-select" id="temperature5" name="temperature">
                    <option value="iced">Iced</option>
                    <option value="hot">Hot</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="addToCart('Caramel Macchiato', 'name5', 'size5', 'temperature5')">Add to cart</button>
        </div>
    </div>
  </div>
</div>

<!-- Modal 6-->
<div class="modal fade" id="coffee6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Signature Latte</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <!-- Name Input -->
            <div class="mb-3">
                <label for="name6" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name6" name="name" placeholder="Enter your name" required>
            </div>

            <!-- Size Options -->
            <div class="mb-3">
                <label for="size6" class="form-label">Size:</label>
                <select class="form-select" id="size6" name="size">
                    <option value="venti" data-price="165">Venti - 165</option>
                    <option value="grande" data-price="150">Grande - 150</option>
                </select>
            </div>

            <!-- Temperature Options -->
            <div class="mb-3">
                <label for="temperature6" class="form-label">Temperature:</label>
                <select class="form-select" id="temperature6" name="temperature">
                    <option value="iced">Iced</option>
                    <option value="hot">Hot</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="addToCart('Signature Latte', 'name6', 'size6', 'temperature6')">Add to cart</button>
        </div>
    </div>
  </div>
</div>

<!-- Add this modal at the end of your HTML body -->
<div class="modal fade" id="confirmOrderModal" tabindex="-1" aria-labelledby="confirmOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmOrderModalLabel">Confirm Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to place the order?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="confirmPlaceOrder()">Yes, Place Order</button>
            </div>
        </div>
    </div>
</div>
