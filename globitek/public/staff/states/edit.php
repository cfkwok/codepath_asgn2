<?php
require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to('index.php');
}

$errors = array();
$states_result = find_state_by_id($_GET['id']);
// No loop, only one result
$state = db_fetch_assoc($states_result);

if (isset($_POST['name'])) { $state['name'] = $_POST['name']; }
if (isset($_POST['code'])) { $state['code'] = $_POST['code']; }

if (is_post_request()) {
	$result = update_state($state);

	if ($result === true) {
		redirect_to('show.php?id=' . $state['id']);
	} else {
		$errors = $result;
	}
}

?>
<?php $page_title = 'Staff: Edit State ' . $state['name']; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <a href="#add_a_url">Back to States List</a><br />

  <h1>Edit State: <?php echo $state['name']; ?></h1>

  <?php echo display_errors($errors); ?>

  <form action="edit.php?id=<?php echo $state['id']; ?>" method="post">
    Name:<br />
    <input type="text" name="name" value="<?php echo $state['name']; ?>" /><br />
    Code:<br />
    <input type="text" name="code" value="<?php echo $state['code']; ?>" /><br />
    <br />
    <input type="submit" name="submit" value="Update"  />
  </form>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
