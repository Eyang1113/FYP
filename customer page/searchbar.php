<?php
include('header.php');
?>

<link rel="stylesheet" href="searchbar.css?<?php echo time(); ?>">

<?php
if(isset($_GET['search'])){
    $search = $_GET['search'];
    
    switch ($search) {
        case 'racquet':
            header("Location: racquetlist.php");
            break;
        case 'shoes':
            header("Location: shoeslist.php");
            break;
        case 'string':
            header("Location: string.php");
            break;
        case 'bag':
            header("Location: bag.php");
            break;
        case 'clothes':
            header("Location: clothes.php");
            break;
        default:
            $errorMessage = "Sorry, we do not sell the item \"$search\"";
            break;
    }
}
?>

<form action="search.php" method="get">
    <input style="height:35px;" type="text" name="search" id="search" placeholder="Search for ......">
    <button type="submit" class="btn">Search</button>
</form>

<?php if (isset($errorMessage)): ?>
    <div class="notification">
        <?php echo $errorMessage; ?>
    </div>
<?php endif; ?>

<?php
include('footer.php');
?>