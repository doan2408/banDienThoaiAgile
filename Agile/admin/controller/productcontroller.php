<?php
class productController
{
    public $productModel;
    function __construct()
    {
        $this->productModel = new productModel();
    }
    function listProduct()
    {
        $categoryId = isset($_GET['category']) && $_GET['category'] !== '' ? $_GET['category'] : null;
        $products = $this->productModel->product($categoryId);
        $category = $this->productModel->category();
        require_once "view/listProduct.php";
    }
    function listProduct_variant($id_product) {
        $variants = $this->productModel->product_variant($id_product);
        $product = $this->productModel->findProductById($id_product);

        require_once "view/listproduct_variant.php";
    }
    function insert()
    {
        $category = $this->productModel->category();
        $variant = $this->productModel->variant();
        require_once "view/insertProduct.php";
        if (isset($_POST['btn_insert'])) {
            $category = $_POST['category'];
            $firms = $_POST['firms'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $discount = $_POST['discount'];
            $description = $_POST['description'];
            $img = $_FILES['img']['name'];
            $img_tmp = $_FILES['img']['tmp_name'];
            move_uploaded_file($img_tmp, '../assets/img/' . $img);
            $variants = [];
            if (isset($_POST['variant_color'])) {
                $variant_colors = $_POST['variant_color'];  // Mảng chứa tên màu sắc
                $variant_quantities = $_POST['variant_quantity'];  // Mảng chứa số lượng của mỗi màu sắc
                // Kiểm tra trùng lặp màu sắc đầu vào
                if (count($variant_colors) !== count(array_unique($variant_colors))) {
                    echo "<script>alert('Lỗi: Có màu sắc trùng lặp trong danh sách. Vui lòng kiểm tra lại!');window.history.back();</script>";
                    exit();
                }
                $amount = array_sum($variant_quantities);  // Tổng số lượng của tất cả biến thể
                // Kết hợp thành mảng các biến thể
                foreach ($variant_colors as $index => $color) {
                    $variants[] = [
                        'name_color' => $color,
                        'quantity' => $variant_quantities[$index]
                    ];
                }
            }
            if ($this->productModel->insert($category, $firms, $name, $price, $amount, $discount, $description, $img, $variants)) {
                header("Location:?act=listProduct");
                exit();
            } else {
                echo "Thêm thất bại";
            }
        }
    }
    function update($id)
    {
        $oneProduct = $this->productModel->findProductById($id);
        $category = $this->productModel->category();
        require_once "view/updateProduct.php";
        if (isset($_POST['btn_update'])) {
            $category = $_POST['category'];
            $firms = $_POST['firms'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $amount = $_POST['amount'];
            $discount = $_POST['discount'];
            $description = $_POST['description'];
            if (empty($_FILES['img']['name'])) {
                $img = "";
            } else {
                $img = $_FILES['img']['name'];
                $img_tmp = $_FILES['img']['tmp_name'];
                move_uploaded_file($img_tmp, '../assets/img/' . $img);
            }
            if ($this->productModel->update($id, $category, $firms, $name, $price, $amount, $discount, $description, $img)) {
                header("Location:?act=listProduct");
            } else {
                echo "Sửa thất bại";
            }
        }
    }
    function delete($id)
    {
        if ($this->productModel->delete($id)) {
            header("Location:?act=listProduct");
        } else {
            echo "Xóa thất bại";
        }
    }
    function updateProduct_variant($id_pro,$id_var){
        $oneProduct_variant = $this->productModel->findPro_varById($id_pro,$id_var);
        $variant = $this->productModel->variant();
        require_once "view/updateproduct_variant.php";
        $current_color_id = $oneProduct_variant['id_variant'];
        if (isset($_POST['new_id_variant'])) {
            $new_color_id = $_POST['new_id_variant'];
            // Kiểm tra nếu màu này đã tồn tại trong sản phẩm
            if ($this->productModel->checkColorExists($id_pro, $new_color_id,$current_color_id)) {
                echo "<script>alert('Màu sắc này đã tồn tại trong sản phẩm, không thể cập nhật.')</script>";
                return;
            }
        }
        if (isset($_POST['btn_update'])) {
            $new_id_variant = $_POST['new_id_variant'];
            $quantity = $_POST['quantity'];
            if ($this->productModel->updateProduct_variant($id_pro,$id_var,$new_id_variant,$quantity)) {
                header("Location:?act=listProduct");
            } else {
                echo "Sửa thất bại";
            }
        }
    }
    function deleteProduct_variant($id_pro, $id_var){
        if ($this->productModel->deleteProduct_variant($id_pro, $id_var)) {
            header("Location:?act=listProduct");
        } else {
            echo "Xóa thất bại";
        }
    }
    // doan fix merge
}
<?php
class productController
{
    public $productModel;
    function __construct()
    {
        $this->productModel = new productModel();
    }
    function listProduct()
    {
        $categoryId = isset($_GET['category']) && $_GET['category'] !== '' ? $_GET['category'] : null;
        $products = $this->productModel->product($categoryId);
        $category = $this->productModel->category();
        require_once "view/listProduct.php";
    }
    function listProduct_variant($id_product) {
        $variants = $this->productModel->product_variant($id_product);
        $product = $this->productModel->findProductById($id_product);

        require_once "view/listproduct_variant.php";
    }
    function insert()
    {
        $category = $this->productModel->category();
        $variant = $this->productModel->variant();
        require_once "view/insertProduct.php";
        if (isset($_POST['btn_insert'])) {
            $category = $_POST['category'];
            $firms = $_POST['firms'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $discount = $_POST['discount'];
            $description = $_POST['description'];
            $img = $_FILES['img']['name'];
            $img_tmp = $_FILES['img']['tmp_name'];
            move_uploaded_file($img_tmp, '../assets/img/' . $img);
            $variants = [];
            if (isset($_POST['variant_color'])) {
                $variant_colors = $_POST['variant_color'];  // Mảng chứa tên màu sắc
                $variant_quantities = $_POST['variant_quantity'];  // Mảng chứa số lượng của mỗi màu sắc
                // Kiểm tra trùng lặp màu sắc đầu vào
                if (count($variant_colors) !== count(array_unique($variant_colors))) {
                    echo "<script>alert('Lỗi: Có màu sắc trùng lặp trong danh sách. Vui lòng kiểm tra lại!');window.history.back();</script>";
                    exit();
                }
                $amount = array_sum($variant_quantities);  // Tổng số lượng của tất cả biến thể
                // Kết hợp thành mảng các biến thể
                foreach ($variant_colors as $index => $color) {
                    $variants[] = [
                        'name_color' => $color,
                        'quantity' => $variant_quantities[$index]
                    ];
                }
            }
            if ($this->productModel->insert($category, $firms, $name, $price, $amount, $discount, $description, $img, $variants)) {
                header("Location:?act=listProduct");
                exit();
            } else {
                echo "Thêm thất bại";
            }
        }
    }
    function update($id)
    {
        $oneProduct = $this->productModel->findProductById($id);
        $category = $this->productModel->category();
        require_once "view/updateProduct.php";
        if (isset($_POST['btn_update'])) {
            $category = $_POST['category'];
            $firms = $_POST['firms'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $amount = $_POST['amount'];
            $discount = $_POST['discount'];
            $description = $_POST['description'];
            if (empty($_FILES['img']['name'])) {
                $img = "";
            } else {
                $img = $_FILES['img']['name'];
                $img_tmp = $_FILES['img']['tmp_name'];
                move_uploaded_file($img_tmp, '../assets/img/' . $img);
            }
            if ($this->productModel->update($id, $category, $firms, $name, $price, $amount, $discount, $description, $img)) {
                header("Location:?act=listProduct");
            } else {
                echo "Sửa thất bại";
            }
        }
    }
    function delete($id)
    {
        if ($this->productModel->delete($id)) {
            header("Location:?act=listProduct");
        } else {
            echo "Xóa thất bại";
        }
    }
    function updateProduct_variant($id_pro,$id_var){
        $oneProduct_variant = $this->productModel->findPro_varById($id_pro,$id_var);
        $variant = $this->productModel->variant();
        require_once "view/updateproduct_variant.php";
        $current_color_id = $oneProduct_variant['id_variant'];
        if (isset($_POST['new_id_variant'])) {
            $new_color_id = $_POST['new_id_variant'];
            // Kiểm tra nếu màu này đã tồn tại trong sản phẩm
            if ($this->productModel->checkColorExists($id_pro, $new_color_id,$current_color_id)) {
                echo "<script>alert('Màu sắc này đã tồn tại trong sản phẩm, không thể cập nhật.')</script>";
                return;
            }
        }
        if (isset($_POST['btn_update'])) {
            $new_id_variant = $_POST['new_id_variant'];
            $quantity = $_POST['quantity'];
            if ($this->productModel->updateProduct_variant($id_pro,$id_var,$new_id_variant,$quantity)) {
                header("Location:?act=listProduct");
            } else {
                echo "Sửa thất bại";
            }
        }
    }
    function deleteProduct_variant($id_pro, $id_var){
        if ($this->productModel->deleteProduct_variant($id_pro, $id_var)) {
            header("Location:?act=listProduct");
        } else {
            echo "Xóa thất bại";
        }
    }
    // doan fix merge
}

<?php
class productController
{
    public $productModel;
    function __construct()
    {
        $this->productModel = new productModel();
    }
    function listProduct()
    {
        $categoryId = isset($_GET['category']) && $_GET['category'] !== '' ? $_GET['category'] : null;
        $products = $this->productModel->product($categoryId);
        $category = $this->productModel->category();
        require_once "view/listProduct.php";
    }
    function listProduct_variant($id_product) {
        $variants = $this->productModel->product_variant($id_product);
        $product = $this->productModel->findProductById($id_product);

        require_once "view/listproduct_variant.php";
    }
    function insert()
    {
        $category = $this->productModel->category();
        $variant = $this->productModel->variant();
        require_once "view/insertProduct.php";
        if (isset($_POST['btn_insert'])) {
            $category = $_POST['category'];
            $firms = $_POST['firms'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $discount = $_POST['discount'];
            $description = $_POST['description'];
            $img = $_FILES['img']['name'];
            $img_tmp = $_FILES['img']['tmp_name'];
            move_uploaded_file($img_tmp, '../assets/img/' . $img);
            $variants = [];
            if (isset($_POST['variant_color'])) {
                $variant_colors = $_POST['variant_color'];  // Mảng chứa tên màu sắc
                $variant_quantities = $_POST['variant_quantity'];  // Mảng chứa số lượng của mỗi màu sắc
                // Kiểm tra trùng lặp màu sắc đầu vào
                if (count($variant_colors) !== count(array_unique($variant_colors))) {
                    echo "<script>alert('Lỗi: Có màu sắc trùng lặp trong danh sách. Vui lòng kiểm tra lại!');window.history.back();</script>";
                    exit();
                }
                $amount = array_sum($variant_quantities);  // Tổng số lượng của tất cả biến thể
                // Kết hợp thành mảng các biến thể
                foreach ($variant_colors as $index => $color) {
                    $variants[] = [
                        'name_color' => $color,
                        'quantity' => $variant_quantities[$index]
                    ];
                }
            }
            if ($this->productModel->insert($category, $firms, $name, $price, $amount, $discount, $description, $img, $variants)) {
                header("Location:?act=listProduct");
                exit();
            } else {
                echo "Thêm thất bại";
            }
        }
    }
    function update($id)
    {
        $oneProduct = $this->productModel->findProductById($id);
        $category = $this->productModel->category();
        require_once "view/updateProduct.php";
        if (isset($_POST['btn_update'])) {
            $category = $_POST['category'];
            $firms = $_POST['firms'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $amount = $_POST['amount'];
            $discount = $_POST['discount'];
            $description = $_POST['description'];
            if (empty($_FILES['img']['name'])) {
                $img = "";
            } else {
                $img = $_FILES['img']['name'];
                $img_tmp = $_FILES['img']['tmp_name'];
                move_uploaded_file($img_tmp, '../assets/img/' . $img);
            }
            if ($this->productModel->update($id, $category, $firms, $name, $price, $amount, $discount, $description, $img)) {
                header("Location:?act=listProduct");
            } else {
                echo "Sửa thất bại";
            }
        }
    }
    function delete($id)
    {
        if ($this->productModel->delete($id)) {
            header("Location:?act=listProduct");
        } else {
            echo "Xóa thất bại";
        }
    }
    function updateProduct_variant($id_pro,$id_var){
        $oneProduct_variant = $this->productModel->findPro_varById($id_pro,$id_var);
        $variant = $this->productModel->variant();
        require_once "view/updateproduct_variant.php";
        $current_color_id = $oneProduct_variant['id_variant'];
        if (isset($_POST['new_id_variant'])) {
            $new_color_id = $_POST['new_id_variant'];
            // Kiểm tra nếu màu này đã tồn tại trong sản phẩm
            if ($this->productModel->checkColorExists($id_pro, $new_color_id,$current_color_id)) {
                echo "<script>alert('Màu sắc này đã tồn tại trong sản phẩm, không thể cập nhật.')</script>";
                return;
            }
        }
        if (isset($_POST['btn_update'])) {
            $new_id_variant = $_POST['new_id_variant'];
            $quantity = $_POST['quantity'];
            if ($this->productModel->updateProduct_variant($id_pro,$id_var,$new_id_variant,$quantity)) {
                header("Location:?act=listProduct");
            } else {
                echo "Sửa thất bại";
            }
        }
    }
    function deleteProduct_variant($id_pro, $id_var){
        if ($this->productModel->deleteProduct_variant($id_pro, $id_var)) {
            header("Location:?act=listProduct");
        } else {
            echo "Xóa thất bại";
        }
    }
    // doan fix merge
}

<?php
class productController
{
    public $productModel;
    function __construct()
    {
        $this->productModel = new productModel();
    }
    function listProduct()
    {
        $categoryId = isset($_GET['category']) && $_GET['category'] !== '' ? $_GET['category'] : null;
        $products = $this->productModel->product($categoryId);
        $category = $this->productModel->category();
        require_once "view/listProduct.php";
    }
    function listProduct_variant($id_product) {
        $variants = $this->productModel->product_variant($id_product);
        $product = $this->productModel->findProductById($id_product);

        require_once "view/listproduct_variant.php";
    }
    function insert()
    {
        $category = $this->productModel->category();
        $variant = $this->productModel->variant();
        require_once "view/insertProduct.php";
        if (isset($_POST['btn_insert'])) {
            $category = $_POST['category'];
            $firms = $_POST['firms'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $discount = $_POST['discount'];
            $description = $_POST['description'];
            $img = $_FILES['img']['name'];
            $img_tmp = $_FILES['img']['tmp_name'];
            move_uploaded_file($img_tmp, '../assets/img/' . $img);
            $variants = [];
            if (isset($_POST['variant_color'])) {
                $variant_colors = $_POST['variant_color'];  // Mảng chứa tên màu sắc
                $variant_quantities = $_POST['variant_quantity'];  // Mảng chứa số lượng của mỗi màu sắc
                // Kiểm tra trùng lặp màu sắc đầu vào
                if (count($variant_colors) !== count(array_unique($variant_colors))) {
                    echo "<script>alert('Lỗi: Có màu sắc trùng lặp trong danh sách. Vui lòng kiểm tra lại!');window.history.back();</script>";
                    exit();
                }
                $amount = array_sum($variant_quantities);  // Tổng số lượng của tất cả biến thể
                // Kết hợp thành mảng các biến thể
                foreach ($variant_colors as $index => $color) {
                    $variants[] = [
                        'name_color' => $color,
                        'quantity' => $variant_quantities[$index]
                    ];
                }
            }
            if ($this->productModel->insert($category, $firms, $name, $price, $amount, $discount, $description, $img, $variants)) {
                header("Location:?act=listProduct");
                exit();
            } else {
                echo "Thêm thất bại";
            }
        }
    }
    function update($id)
    {
        $oneProduct = $this->productModel->findProductById($id);
        $category = $this->productModel->category();
        require_once "view/updateProduct.php";
        if (isset($_POST['btn_update'])) {
            $category = $_POST['category'];
            $firms = $_POST['firms'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $amount = $_POST['amount'];
            $discount = $_POST['discount'];
            $description = $_POST['description'];
            if (empty($_FILES['img']['name'])) {
                $img = "";
            } else {
                $img = $_FILES['img']['name'];
                $img_tmp = $_FILES['img']['tmp_name'];
                move_uploaded_file($img_tmp, '../assets/img/' . $img);
            }
            if ($this->productModel->update($id, $category, $firms, $name, $price, $amount, $discount, $description, $img)) {
                header("Location:?act=listProduct");
            } else {
                echo "Sửa thất bại";
            }
        }
    }
    function delete($id)
    {
        if ($this->productModel->delete($id)) {
            header("Location:?act=listProduct");
        } else {
            echo "Xóa thất bại";
        }
    }
    function updateProduct_variant($id_pro,$id_var){
        $oneProduct_variant = $this->productModel->findPro_varById($id_pro,$id_var);
        $variant = $this->productModel->variant();
        require_once "view/updateproduct_variant.php";
        $current_color_id = $oneProduct_variant['id_variant'];
        if (isset($_POST['new_id_variant'])) {
            $new_color_id = $_POST['new_id_variant'];
            // Kiểm tra nếu màu này đã tồn tại trong sản phẩm
            if ($this->productModel->checkColorExists($id_pro, $new_color_id,$current_color_id)) {
                echo "<script>alert('Màu sắc này đã tồn tại trong sản phẩm, không thể cập nhật.')</script>";
                return;
            }
        }
        if (isset($_POST['btn_update'])) {
            $new_id_variant = $_POST['new_id_variant'];
            $quantity = $_POST['quantity'];
            if ($this->productModel->updateProduct_variant($id_pro,$id_var,$new_id_variant,$quantity)) {
                header("Location:?act=listProduct");
            } else {
                echo "Sửa thất bại";
            }
        }
    }
    function deleteProduct_variant($id_pro, $id_var){
        if ($this->productModel->deleteProduct_variant($id_pro, $id_var)) {
            header("Location:?act=listProduct");
        } else {
            echo "Xóa thất bại";
        }
    }
    // doan fix merge
}

<?php
class productController
{
    public $productModel;
    function __construct()
    {
        $this->productModel = new productModel();
    }
    function listProduct()
    {
        $categoryId = isset($_GET['category']) && $_GET['category'] !== '' ? $_GET['category'] : null;
        $products = $this->productModel->product($categoryId);
        $category = $this->productModel->category();
        require_once "view/listProduct.php";
    }
    function listProduct_variant($id_product) {
        $variants = $this->productModel->product_variant($id_product);
        $product = $this->productModel->findProductById($id_product);

        require_once "view/listproduct_variant.php";
    }
    function insert()
    {
        $category = $this->productModel->category();
        $variant = $this->productModel->variant();
        require_once "view/insertProduct.php";
        if (isset($_POST['btn_insert'])) {
            $category = $_POST['category'];
            $firms = $_POST['firms'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $discount = $_POST['discount'];
            $description = $_POST['description'];
            $img = $_FILES['img']['name'];
            $img_tmp = $_FILES['img']['tmp_name'];
            move_uploaded_file($img_tmp, '../assets/img/' . $img);
            $variants = [];
            if (isset($_POST['variant_color'])) {
                $variant_colors = $_POST['variant_color'];  // Mảng chứa tên màu sắc
                $variant_quantities = $_POST['variant_quantity'];  // Mảng chứa số lượng của mỗi màu sắc
                // Kiểm tra trùng lặp màu sắc đầu vào
                if (count($variant_colors) !== count(array_unique($variant_colors))) {
                    echo "<script>alert('Lỗi: Có màu sắc trùng lặp trong danh sách. Vui lòng kiểm tra lại!');window.history.back();</script>";
                    exit();
                }
                $amount = array_sum($variant_quantities);  // Tổng số lượng của tất cả biến thể
                // Kết hợp thành mảng các biến thể
                foreach ($variant_colors as $index => $color) {
                    $variants[] = [
                        'name_color' => $color,
                        'quantity' => $variant_quantities[$index]
                    ];
                }
            }
            if ($this->productModel->insert($category, $firms, $name, $price, $amount, $discount, $description, $img, $variants)) {
                header("Location:?act=listProduct");
                exit();
            } else {
                echo "Thêm thất bại";
            }
        }
    }
    function update($id)
    {
        $oneProduct = $this->productModel->findProductById($id);
        $category = $this->productModel->category();
        require_once "view/updateProduct.php";
        if (isset($_POST['btn_update'])) {
            $category = $_POST['category'];
            $firms = $_POST['firms'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $amount = $_POST['amount'];
            $discount = $_POST['discount'];
            $description = $_POST['description'];
            if (empty($_FILES['img']['name'])) {
                $img = "";
            } else {
                $img = $_FILES['img']['name'];
                $img_tmp = $_FILES['img']['tmp_name'];
                move_uploaded_file($img_tmp, '../assets/img/' . $img);
            }
            if ($this->productModel->update($id, $category, $firms, $name, $price, $amount, $discount, $description, $img)) {
                header("Location:?act=listProduct");
            } else {
                echo "Sửa thất bại";
            }
        }
    }
    function delete($id)
    {
        if ($this->productModel->delete($id)) {
            header("Location:?act=listProduct");
        } else {
            echo "Xóa thất bại";
        }
    }
    function updateProduct_variant($id_pro,$id_var){
        $oneProduct_variant = $this->productModel->findPro_varById($id_pro,$id_var);
        $variant = $this->productModel->variant();
        require_once "view/updateproduct_variant.php";
        $current_color_id = $oneProduct_variant['id_variant'];
        if (isset($_POST['new_id_variant'])) {
            $new_color_id = $_POST['new_id_variant'];
            // Kiểm tra nếu màu này đã tồn tại trong sản phẩm
            if ($this->productModel->checkColorExists($id_pro, $new_color_id,$current_color_id)) {
                echo "<script>alert('Màu sắc này đã tồn tại trong sản phẩm, không thể cập nhật.')</script>";
                return;
            }
        }
        if (isset($_POST['btn_update'])) {
            $new_id_variant = $_POST['new_id_variant'];
            $quantity = $_POST['quantity'];
            if ($this->productModel->updateProduct_variant($id_pro,$id_var,$new_id_variant,$quantity)) {
                header("Location:?act=listProduct");
            } else {
                echo "Sửa thất bại";
            }
        }
    }
    function deleteProduct_variant($id_pro, $id_var){
        if ($this->productModel->deleteProduct_variant($id_pro, $id_var)) {
            header("Location:?act=listProduct");
        } else {
            echo "Xóa thất bại";
        }
    }
    // doan fix merge
}

<?php
class productController
{
    public $productModel;
    function __construct()
    {
        $this->productModel = new productModel();
    }
    function listProduct()
    {
        $categoryId = isset($_GET['category']) && $_GET['category'] !== '' ? $_GET['category'] : null;
        $products = $this->productModel->product($categoryId);
        $category = $this->productModel->category();
        require_once "view/listProduct.php";
    }
    function listProduct_variant($id_product) {
        $variants = $this->productModel->product_variant($id_product);
        $product = $this->productModel->findProductById($id_product);

        require_once "view/listproduct_variant.php";
    }
    function insert()
    {
        $category = $this->productModel->category();
        $variant = $this->productModel->variant();
        require_once "view/insertProduct.php";
        if (isset($_POST['btn_insert'])) {
            $category = $_POST['category'];
            $firms = $_POST['firms'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $discount = $_POST['discount'];
            $description = $_POST['description'];
            $img = $_FILES['img']['name'];
            $img_tmp = $_FILES['img']['tmp_name'];
            move_uploaded_file($img_tmp, '../assets/img/' . $img);
            $variants = [];
            if (isset($_POST['variant_color'])) {
                $variant_colors = $_POST['variant_color'];  // Mảng chứa tên màu sắc
                $variant_quantities = $_POST['variant_quantity'];  // Mảng chứa số lượng của mỗi màu sắc
                // Kiểm tra trùng lặp màu sắc đầu vào
                if (count($variant_colors) !== count(array_unique($variant_colors))) {
                    echo "<script>alert('Lỗi: Có màu sắc trùng lặp trong danh sách. Vui lòng kiểm tra lại!');window.history.back();</script>";
                    exit();
                }
                $amount = array_sum($variant_quantities);  // Tổng số lượng của tất cả biến thể
                // Kết hợp thành mảng các biến thể
                foreach ($variant_colors as $index => $color) {
                    $variants[] = [
                        'name_color' => $color,
                        'quantity' => $variant_quantities[$index]
                    ];
                }
            }
            if ($this->productModel->insert($category, $firms, $name, $price, $amount, $discount, $description, $img, $variants)) {
                header("Location:?act=listProduct");
                exit();
            } else {
                echo "Thêm thất bại";
            }
        }
    }
    function update($id)
    {
        $oneProduct = $this->productModel->findProductById($id);
        $category = $this->productModel->category();
        require_once "view/updateProduct.php";
        if (isset($_POST['btn_update'])) {
            $category = $_POST['category'];
            $firms = $_POST['firms'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $amount = $_POST['amount'];
            $discount = $_POST['discount'];
            $description = $_POST['description'];
            if (empty($_FILES['img']['name'])) {
                $img = "";
            } else {
                $img = $_FILES['img']['name'];
                $img_tmp = $_FILES['img']['tmp_name'];
                move_uploaded_file($img_tmp, '../assets/img/' . $img);
            }
            if ($this->productModel->update($id, $category, $firms, $name, $price, $amount, $discount, $description, $img)) {
                header("Location:?act=listProduct");
            } else {
                echo "Sửa thất bại";
            }
        }
    }
    function delete($id)
    {
        if ($this->productModel->delete($id)) {
            header("Location:?act=listProduct");
        } else {
            echo "Xóa thất bại";
        }
    }
    function updateProduct_variant($id_pro,$id_var){
        $oneProduct_variant = $this->productModel->findPro_varById($id_pro,$id_var);
        $variant = $this->productModel->variant();
        require_once "view/updateproduct_variant.php";
        $current_color_id = $oneProduct_variant['id_variant'];
        if (isset($_POST['new_id_variant'])) {
            $new_color_id = $_POST['new_id_variant'];
            // Kiểm tra nếu màu này đã tồn tại trong sản phẩm
            if ($this->productModel->checkColorExists($id_pro, $new_color_id,$current_color_id)) {
                echo "<script>alert('Màu sắc này đã tồn tại trong sản phẩm, không thể cập nhật.')</script>";
                return;
            }
        }
        if (isset($_POST['btn_update'])) {
            $new_id_variant = $_POST['new_id_variant'];
            $quantity = $_POST['quantity'];
            if ($this->productModel->updateProduct_variant($id_pro,$id_var,$new_id_variant,$quantity)) {
                header("Location:?act=listProduct");
            } else {
                echo "Sửa thất bại";
            }
        }
    }
    function deleteProduct_variant($id_pro, $id_var){
        if ($this->productModel->deleteProduct_variant($id_pro, $id_var)) {
            header("Location:?act=listProduct");
        } else {
            echo "Xóa thất bại";
        }
    }
    // doan fix merge
}

<?php
class productController
{
    public $productModel;
    function __construct()
    {
        $this->productModel = new productModel();
    }
    function listProduct()
    {
        $categoryId = isset($_GET['category']) && $_GET['category'] !== '' ? $_GET['category'] : null;
        $products = $this->productModel->product($categoryId);
        $category = $this->productModel->category();
        require_once "view/listProduct.php";
    }
    function listProduct_variant($id_product) {
        $variants = $this->productModel->product_variant($id_product);
        $product = $this->productModel->findProductById($id_product);

        require_once "view/listproduct_variant.php";
    }
    function insert()
    {
        $category = $this->productModel->category();
        $variant = $this->productModel->variant();
        require_once "view/insertProduct.php";
        if (isset($_POST['btn_insert'])) {
            $category = $_POST['category'];
            $firms = $_POST['firms'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $discount = $_POST['discount'];
            $description = $_POST['description'];
            $img = $_FILES['img']['name'];
            $img_tmp = $_FILES['img']['tmp_name'];
            move_uploaded_file($img_tmp, '../assets/img/' . $img);
            $variants = [];
            if (isset($_POST['variant_color'])) {
                $variant_colors = $_POST['variant_color'];  // Mảng chứa tên màu sắc
                $variant_quantities = $_POST['variant_quantity'];  // Mảng chứa số lượng của mỗi màu sắc
                // Kiểm tra trùng lặp màu sắc đầu vào
                if (count($variant_colors) !== count(array_unique($variant_colors))) {
                    echo "<script>alert('Lỗi: Có màu sắc trùng lặp trong danh sách. Vui lòng kiểm tra lại!');window.history.back();</script>";
                    exit();
                }
                $amount = array_sum($variant_quantities);  // Tổng số lượng của tất cả biến thể
                // Kết hợp thành mảng các biến thể
                foreach ($variant_colors as $index => $color) {
                    $variants[] = [
                        'name_color' => $color,
                        'quantity' => $variant_quantities[$index]
                    ];
                }
            }
            if ($this->productModel->insert($category, $firms, $name, $price, $amount, $discount, $description, $img, $variants)) {
                header("Location:?act=listProduct");
                exit();
            } else {
                echo "Thêm thất bại";
            }
        }
    }
    function update($id)
    {
        $oneProduct = $this->productModel->findProductById($id);
        $category = $this->productModel->category();
        require_once "view/updateProduct.php";
        if (isset($_POST['btn_update'])) {
            $category = $_POST['category'];
            $firms = $_POST['firms'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $amount = $_POST['amount'];
            $discount = $_POST['discount'];
            $description = $_POST['description'];
            if (empty($_FILES['img']['name'])) {
                $img = "";
            } else {
                $img = $_FILES['img']['name'];
                $img_tmp = $_FILES['img']['tmp_name'];
                move_uploaded_file($img_tmp, '../assets/img/' . $img);
            }
            if ($this->productModel->update($id, $category, $firms, $name, $price, $amount, $discount, $description, $img)) {
                header("Location:?act=listProduct");
            } else {
                echo "Sửa thất bại";
            }
        }
    }
    function delete($id)
    {
        if ($this->productModel->delete($id)) {
            header("Location:?act=listProduct");
        } else {
            echo "Xóa thất bại";
        }
    }
    function updateProduct_variant($id_pro,$id_var){
        $oneProduct_variant = $this->productModel->findPro_varById($id_pro,$id_var);
        $variant = $this->productModel->variant();
        require_once "view/updateproduct_variant.php";
        $current_color_id = $oneProduct_variant['id_variant'];
        if (isset($_POST['new_id_variant'])) {
            $new_color_id = $_POST['new_id_variant'];
            // Kiểm tra nếu màu này đã tồn tại trong sản phẩm
            if ($this->productModel->checkColorExists($id_pro, $new_color_id,$current_color_id)) {
                echo "<script>alert('Màu sắc này đã tồn tại trong sản phẩm, không thể cập nhật.')</script>";
                return;
            }
        }
        if (isset($_POST['btn_update'])) {
            $new_id_variant = $_POST['new_id_variant'];
            $quantity = $_POST['quantity'];
            if ($this->productModel->updateProduct_variant($id_pro,$id_var,$new_id_variant,$quantity)) {
                header("Location:?act=listProduct");
            } else {
                echo "Sửa thất bại";
            }
        }
    }
    function deleteProduct_variant($id_pro, $id_var){
        if ($this->productModel->deleteProduct_variant($id_pro, $id_var)) {
            header("Location:?act=listProduct");
        } else {
            echo "Xóa thất bại";
        }
    }
    // doan fix merge
}


<?php
class productController
{
    public $productModel;
    function __construct()
    {
        $this->productModel = new productModel();
    }
    function listProduct()
    {
        $categoryId = isset($_GET['category']) && $_GET['category'] !== '' ? $_GET['category'] : null;
        $products = $this->productModel->product($categoryId);
        $category = $this->productModel->category();
        require_once "view/listProduct.php";
    }
    function listProduct_variant($id_product) {
        $variants = $this->productModel->product_variant($id_product);
        $product = $this->productModel->findProductById($id_product);

        require_once "view/listproduct_variant.php";
    }
    function insert()
    {
        $category = $this->productModel->category();
        $variant = $this->productModel->variant();
        require_once "view/insertProduct.php";
        if (isset($_POST['btn_insert'])) {
            $category = $_POST['category'];
            $firms = $_POST['firms'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $discount = $_POST['discount'];
            $description = $_POST['description'];
            $img = $_FILES['img']['name'];
            $img_tmp = $_FILES['img']['tmp_name'];
            move_uploaded_file($img_tmp, '../assets/img/' . $img);
            $variants = [];
            if (isset($_POST['variant_color'])) {
                $variant_colors = $_POST['variant_color'];  // Mảng chứa tên màu sắc
                $variant_quantities = $_POST['variant_quantity'];  // Mảng chứa số lượng của mỗi màu sắc
                // Kiểm tra trùng lặp màu sắc đầu vào
                if (count($variant_colors) !== count(array_unique($variant_colors))) {
                    echo "<script>alert('Lỗi: Có màu sắc trùng lặp trong danh sách. Vui lòng kiểm tra lại!');window.history.back();</script>";
                    exit();
                }
                $amount = array_sum($variant_quantities);  // Tổng số lượng của tất cả biến thể
                // Kết hợp thành mảng các biến thể
                foreach ($variant_colors as $index => $color) {
                    $variants[] = [
                        'name_color' => $color,
                        'quantity' => $variant_quantities[$index]
                    ];
                }
            }
            if ($this->productModel->insert($category, $firms, $name, $price, $amount, $discount, $description, $img, $variants)) {
                header("Location:?act=listProduct");
                exit();
            } else {
                echo "Thêm thất bại";
            }
        }
    }
    function update($id)
    {
        $oneProduct = $this->productModel->findProductById($id);
        $category = $this->productModel->category();
        require_once "view/updateProduct.php";
        if (isset($_POST['btn_update'])) {
            $category = $_POST['category'];
            $firms = $_POST['firms'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $amount = $_POST['amount'];
            $discount = $_POST['discount'];
            $description = $_POST['description'];
            if (empty($_FILES['img']['name'])) {
                $img = "";
            } else {
                $img = $_FILES['img']['name'];
                $img_tmp = $_FILES['img']['tmp_name'];
                move_uploaded_file($img_tmp, '../assets/img/' . $img);
            }
            if ($this->productModel->update($id, $category, $firms, $name, $price, $amount, $discount, $description, $img)) {
                header("Location:?act=listProduct");
            } else {
                echo "Sửa thất bại";
            }
        }
    }
    function delete($id)
    {
        if ($this->productModel->delete($id)) {
            header("Location:?act=listProduct");
        } else {
            echo "Xóa thất bại";
        }
    }
    function updateProduct_variant($id_pro,$id_var){
        $oneProduct_variant = $this->productModel->findPro_varById($id_pro,$id_var);
        $variant = $this->productModel->variant();
        require_once "view/updateproduct_variant.php";
        $current_color_id = $oneProduct_variant['id_variant'];
        if (isset($_POST['new_id_variant'])) {
            $new_color_id = $_POST['new_id_variant'];
            // Kiểm tra nếu màu này đã tồn tại trong sản phẩm
            if ($this->productModel->checkColorExists($id_pro, $new_color_id,$current_color_id)) {
                echo "<script>alert('Màu sắc này đã tồn tại trong sản phẩm, không thể cập nhật.')</script>";
                return;
            }
        }
        if (isset($_POST['btn_update'])) {
            $new_id_variant = $_POST['new_id_variant'];
            $quantity = $_POST['quantity'];
            if ($this->productModel->updateProduct_variant($id_pro,$id_var,$new_id_variant,$quantity)) {
                header("Location:?act=listProduct");
            } else {
                echo "Sửa thất bại";
            }
        }
    }
    function deleteProduct_variant($id_pro, $id_var){
        if ($this->productModel->deleteProduct_variant($id_pro, $id_var)) {
            header("Location:?act=listProduct");
        } else {
            echo "Xóa thất bại";
        }
    }
    // doan fix merge
}

