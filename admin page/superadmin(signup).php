<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" href="style(LoginRegisterCPassword).css?v=<?php echo time(); ?>">
</head>
</head>
<body>
     <div class="body">
          <form action="superadmin(signup-check).php" method="post">
               <h2>SIGN UP</h2>
               <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
               <?php } ?>

               <?php if (isset($_GET['success'])) { ?>
                    <p class="success"><?php echo $_GET['success']; ?></p>
               <?php } ?>

               <label>Name</label>
               <?php if (isset($_GET['name'])) { ?>
                    <input type="text" 
                         name="name" 
                         placeholder="Name"
                         value="<?php echo $_GET['name']; ?>"><br>
               <?php }else{ ?>
                    <input type="text" 
                         name="name" 
                         placeholder="Name"><br>
               <?php }?>

               <label>Username</label>
               <?php if (isset($_GET['aname'])) { ?>
                    <input type="text" 
                         name="aname" 
                         placeholder="Username"
                         value="<?php echo $_GET['aname']; ?>"><br>
               <?php }else{ ?>
                    <input type="text" 
                         name="aname" 
                         placeholder="Username"><br>
               <?php }?>

               <label>E-mail</label>
               <?php if (isset($_GET['aemail'])) { ?>
                    <input type="email"
                         name="aemail"
                         placeholder="E-mail"
                         pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                         value="<?php echo $_GET['aemail']; ?>"><br>
               <?php }else{ ?>
                    <input type="email" 
                         name="aemail" 
                         placeholder="Email"
                         pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br>
               <?php }?>

               <label>Password</label>
               <input type="password" 
                    name="password" 
                    placeholder="Password"><br>

               <label>Re Password</label>
               <input type="password" 
                    name="re_password" 
                    placeholder="Re_Password"><br>

               <button type="submit">Sign Up</button>
               <a href="superadmin(index).php" class="ca">Already have an account?</a>
          </form>
     </div>
</body>
</html>