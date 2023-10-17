<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>


<div class="welcome">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
  	<?php endif ?> 

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>~  Welcome <strong><?php echo $_SESSION['username']; ?></strong>  ~</p>
    <?php endif ?>
</div>


<!-- My code  -->

<!-- <nav class="navbar navbar-expand-sm navbar-dark header fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <b>Custom Portfolio</b>
            </a>
            <ul class="navbar">
                <li class="nav-item">
                    <a class="nav-link" href="#top">Workspace</a>
                </li>             
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact Us</a>
                </li>
                <li class="nav-item">
                    <?php  if (isset($_SESSION['username'])) : ?>
                        <a class="nav-link" href="index.php?logout='1'">Logout</a>
                    <?php endif ?>
                </li>
            </ul>
        </div>
    </nav> -->
    
    <header>
      <img id="logo" src="Portfolio Logo.jpeg">
      <nav>
        <ul>
          <li><a href="#">Workspace</a></li>
          <li><a href="#contact">Contact Us</a></li>
          <li>
          <?php  if (isset($_SESSION['username'])) : ?>
            <a href="index.php?logout='1'">Logout</a>
            <?php endif ?>
        </li>
        </ul>
      </nav>
    </header>
    <div id="top" class="container-fluid">
        <div class="row">
             
            <div class="col-sm-3">
            <h6>Themes:</h6> 
            <select id="selectBox" onchange="changeColor();">
            <option value="white">White</option>
            <option value="blue">Blue</option>
            <option value="green">Green</option>
            <option value="alabaster">Alabaster</option>
            <option value="pink">Pink</option>
            <option value="darkblue">Dark Blue</option>
            </select>

<script type="text/javascript">

function changeColor() {
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    switch(selectedValue){
        case "white": changeWhite();
        break;
        case "blue": changeBlue();
        break;
        case "green": changeGreen();
        break;
        case "alabaster": changeAlabaster();
        break;
        case "pink": changePink();
        break;
        case "darkblue": changeDarkBlue();
        break;
        
    }
}
function changeWhite(){
    var element = (document.querySelector(".divToExport").style.color = "black");
    var element1 = (document.querySelector(".divToExport").style.background = "white");
}
function changeBlue(){
    var element = (document.querySelector(".divToExport").style.color = "#102E54");
    var element1 = (document.querySelector(".divToExport").style.background = "#D6DDE5");
}
function changeGreen(){
    var element = (document.querySelector(".divToExport").style.color = "#2B3D16");
    var element1 = (document.querySelector(".divToExport").style.background = "#DFE8E2");
}
function changeAlabaster(){
    var element = (document.querySelector(".divToExport").style.color = "#000000");
    var element1 = (document.querySelector(".divToExport").style.background = "#EDEAE0");
}
function changePink(){
    var element = (document.querySelector(".divToExport").style.color = "#000000");
    var element1 = (document.querySelector(".divToExport").style.background = "#ECE6E6");
}
function changeDarkBlue(){
    var element = (document.querySelector(".divToExport").style.color = "#EBEBEB");
    var element1 = (document.querySelector(".divToExport").style.background = "#343845");
}

</script>

            </div>
            
            <div class="col-sm-6 divToExport" id="divToExport">
                <div class="border border-2 rounded p-3 my-3">

                    <br>
                    <h1 contenteditable="true">Hi I'm (Your Name)</h1>
                    <h5 contenteditable="true">a photographer</h5>
                    <p class="paragraph" contenteditable="true">
                        (Short bio) <br>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Excepturi nihil quaerat debitis
                        voluptate laboriosam aliquam at aliquid consectetur libero modi officia nisi laborum minus est
                        fugit soluta, facere, iste quo ad architecto nulla nobis rem. Vero odio sapiente velit, id odit
                        facilis illo neque blanditiis repellendus, ut, dicta cum sed.</p>
                    <h3>Some of my works</h3>

                    <input type="file" multiple="multiple" accept="image/jpeg, image/png, image/jpg">
                    <output></output>
                    <script>
                        const output = document.querySelector("output")
                        const input = document.querySelector("input")
                        let imagesArray = []

                        input.addEventListener("change", () => {
                            const files = input.files
                            for (let i = 0; i < files.length; i++) {
                                imagesArray.push(files[i])
                            }
                            displayImages()
                        })

                        function displayImages() {
                            let images = ""
                            imagesArray.forEach((image, index) => {
                                images += `<div class="image">
                <img src="${URL.createObjectURL(image)}" alt="image">
              </div>`
                            })
                            output.innerHTML = images
                        }

                    </script>



                    <h3>Contact Me</h3>
                    <p contenteditable="true">Phone: +1 234567890 <br>E-mail: youremail@gmail.com <br>Facebook: @yourfbid
                    </p>

                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>

        <div class="text-center download">
            <button type="button" onclick="generatePDF()" class="btn download-btn">Export to PDF</button>
        </div>

        <!-- <div class="export-pdf">
  Download it!
  <span>
    <span></span>
  </span>
</div> -->

    </div>
    <script type="text/javascript">
        function generatePDF() {

            var element = document.getElementById('divToExport');
            element.style.width = '700px';
            element.style.height = '900px';
            var opt = {
                margin: 0.5,
                filename: 'myPortfolio.pdf',
                image: { type: 'jpeg', quality: 100 },
                html2canvas: { scale: 4 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait', precision: '12' }
            };

            // choose the element and pass it to html2pdf() function and call the save() on it to save as pdf.
            html2pdf().set(opt).from(element).save();
        }
    </script>
    <footer>
        <div class="footer" id="contact">
            <ul class="socials">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-github"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>

        </div>
    </footer>
</body>
</html>