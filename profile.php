<?php include "head.php"; ?>
<link rel="stylesheet" href="profile.css">
<style>

    .form-control {
        margin-bottom: 10px;
    }
    .btn-outline-success {
       
        color: white;
    }
</style>
</head>
<body>
<div class="container top">

    
    <div class="user">
        <form>
            
            <div class="form-group">
                <label for="exampleFormControlInput1">Name</label>
                
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Your Name">
                <button type="button" class="btn btn-outline-success">Change</button>
                
            </div>
            
            <div class="form-group">
                <label for="exampleFormControlInput1">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                <button type="button" class="btn btn-outline-success">Change</button>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Password</label>
                <button type="button" class="btn btn-outline-success">Change</button>
            </div>
        </form>

        
    </div>

</div>






<?php include "foot.php"; ?>