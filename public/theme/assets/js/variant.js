let listVariant = document.querySelector('#listVariant');
let btnAddVariant = document.querySelector('.addVariant');

if (btnAddVariant) {
    btnAddVariant.addEventListener('click', function () {
        let variantElement = document.querySelector(".variant").cloneNode(true);

        let inputs = variantElement.querySelectorAll("input");

        // Xóa giá trị trong các input
        inputs.forEach(function (input) {
            if (input.type === "number") {
                input.value = "";
            }
        });

        // Kiểm tra và chỉ thêm nút xóa mới nếu không tồn tại
        if (!variantElement.querySelector('.btn-outline-danger')) {
            let btnDelete = document.createElement('input');
            btnDelete.setAttribute("type", "button");
            btnDelete.setAttribute("onclick", 'removeElement(this)');
            btnDelete.setAttribute("class", "btn btn-outline-danger");
            btnDelete.setAttribute("value", "Xóa");
            btnDelete.setAttribute("style", "height: 37px;");

            // Thêm nút xóa vào phần tử clone
            variantElement.appendChild(btnDelete);
        }

        // Thêm phần tử clone vào danh sách
        listVariant.appendChild(variantElement);
    });
}

function removeElement(btn) {
    btn.parentElement.remove();
}


function attachFileInputListener(fileInput) {
    fileInput.addEventListener('change', function(event) {
        var input = event.target;
        var file = input.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            var img = input.nextElementSibling.nextElementSibling;
            var removeButton = img.nextElementSibling;
            img.src = e.target.result;
            img.style.display = 'block';
            input.nextElementSibling.style.display = 'none';
            removeButton.style.display = 'flex';
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    });
}

function attachRemoveButtonListener(removeButton) {
    removeButton.addEventListener('click', function(event) {
        var wrapper = event.target.closest('.file-input-wrapper');
        var fileInput = wrapper.querySelector('input[name="colorImage[]"]');
        var img = wrapper.querySelector('img');
        var customButton = wrapper.querySelector('.custom-button');

        fileInput.value = '';
        img.src = '';
        img.style.display = 'none';
        customButton.style.display = 'flex';
        removeButton.style.display = 'none';
    });
}

const addColor = document.getElementById('addBienTheMauSac');

if(addColor) {
    addColor.addEventListener('click', function () {
        var container = document.getElementById('variantContainer');
        var box = document.querySelector('.variantColor');
        var clone = box.cloneNode(true);
        var addColorBienThe = clone.querySelector('#addBienTheMauSac');
        // Reset all input values in the cloned box
        var fileInput = clone.querySelector('input[type="file"]');
        var colorInput = clone.querySelector('input[type="text"]');
        var img = clone.querySelector('img');
        var customButton = clone.querySelector('.custom-button');
        var removeButton = clone.querySelector('.remove-button');


        let btnDelete = document.createElement('input');
        btnDelete.setAttribute("type", "button");
        btnDelete.setAttribute("onclick", 'removeElement(this)');
        btnDelete.setAttribute("class", "mb-3 btn btn-outline-danger");
        btnDelete.setAttribute("value", "Xóa");
        btnDelete.setAttribute("style", "height: 37px;");


        fileInput.value = '';
        colorInput.value = '';
        img.src = '';
        img.style.display = 'none';
        customButton.style.display = 'flex';
        removeButton.style.display = 'none';

        clone.appendChild(btnDelete);
        container.appendChild(clone);

        // Attach event listeners
        attachFileInputListener(fileInput);
        attachRemoveButtonListener(removeButton);
    });
}

document.querySelectorAll('input[name="colorImage[]"]').forEach(input => {
    attachFileInputListener(input);
});

document.querySelectorAll('.remove-button').forEach(button => {
    attachRemoveButtonListener(button);
});
