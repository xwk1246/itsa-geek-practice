<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>
    <form name="form " id="form" action="action.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file" id="file" onchange="handleFileChange(this)">
        <input type="hidden" name="photoUrl">
        <input id="submit" type="submit" value="打開">
    </form>
    <canvas id='canvas'></canvas>
    <img id="img">
</body>

<script>
    function handleFileChange(e) {
        file = e.files[0];

        if (!file) return;

        let reader = new FileReader();
        reader.onloadend = function(e) {
            img = document.getElementById("img");
            img.src = e.target.result;
            img.onloadend = () => {
                const canvas = document.createElement("canvas");
                // const canvas = document.getElementById("canvas");
                let newHeight = img.height;
                let newWidth = img.width;
                while (newHeight > 1000 || newWidth > 1000) {
                    newHeight = newHeight / 2;
                    newWidth = newWidth / 2;
                }
                canvas.width = newWidth;
                canvas.height = newHeight;
                const ctx = canvas.getContext("2d");
                ctx.beginPath();
                ctx.drawImage(img, 0, 0, newWidth, newHeight);
                const url = canvas.toDataURL(file.type);
                console.log(url);

                const photoUrl = document.forms["form"].elements.photoUrl;
                photoUrl.value = url;

                formdata = new FormData();
                formdata.append("file", "");
            }

        };
        reader.readAsDataURL(file);

        if (!(file.type === 'image/jpeg' || file.type === 'image/png' || file.type === 'image/gif')) alert('不支援此檔案格式!');
    }
</script>

</html>