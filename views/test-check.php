<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <p class="title">
            Chọn ghế ngồi
        </p>
        <div class="input-box-wrapper">
            <div class="box">
                <input type="checkbox" value="Javascript" class="checkbox" id="Javascript">
                <label for="Js">Javascript</label>
            </div>
            <div class="box">
                <input type="checkbox" value="Java" class="checkbox" id="Java">
                <label for="Java">Java</label>
            </div>
            <div class="box">
                <input type="checkbox" value="ReactJS" class="checkbox" id="ReactJS">
                <label for="ReactJS">ReactJS</label>
            </div>

        </div>

        <div class="print-value">
            <p id="value-list" style="color: white; "></p>
        </div>
    </div>
</body>

</html>

<style>
    .container {
        position: relative;
        width: 600px;
        background-color: #232234;
        padding: 24px;
        margin: 30px auto;
    }

    .container .title {
        font-size: 2rem;
        text-align: center;
        color: white;
        text-transform: capitalize;
    }

    .container .input-box-wrapper {
        position: relative;
    }

    .input-box-wrapper .box {
        position: relative;
        display: flex;
        align-items: center;
        border: 1px solid #383854;
        border-bottom: 0;
        padding: 14px 10px;
    }

    .input-box-wrapper>.box>label {
        color: white;
        text-transform: capitalize;
        margin-left: 20px;
        display: block;
        cursor: pointer;
        width: 100%;
    }

    .input-box-wrapper .box .checkbox {
        position: relative;
        width: 20px;
        height: 20px;
        cursor: pointer;
    }
</style>

<script>
    var list = document.getElementById('value-list');
    var text = '<span>Bạn đã chọn: </span>';
    var listArray = [];
    var checkboxs = document.querySelectorAll('.checkbox');
    var text2 = document.querySelectorAll('.input-box-wrapper>.box>label');

    for (var check of checkboxs) {
        check.addEventListener('click', function() {
            if (this.checked == true) {
                listArray.push(this.value);
                list.innerHTML = text + listArray.join(' , ');
                for (var test of text2) {
                    if (test.outerText == this.value) {
                        test.style.color = 'red';
                    }
                }

            } else {
                listArray = listArray.filter(e => e !== this.value);
                list.innerHTML = text + listArray.join(' , ');
                for (var test of text2) {
                    if (test.outerText == this.value) {
                        test.style.color = 'white';
                    }
                }
            }
        })
    }
</script>