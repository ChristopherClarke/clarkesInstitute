<?php 
    $title='Admin';
    require_once 'includes/header.php';
    require_once 'includes/authenticated.php';
    require_once 'db/conn.php';
    $results = $crud->getSubscribers();
 ?>
<br>
<h1 class="text-center">Subscribers</h1>
<br>
<div class="p-3">
<table class="table table-hover">
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Actions</th>       
    </tr> 
        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){ ?>
            <tr>
                <td><?php echo $r['firstname'] ?></td>
                <td><?php echo $r['lastname'] ?></td>
                <td><?php echo $r['email'] ?></td>
                <td>
                    <a href="view.php?id=<?php echo $r['subscriber_id'] ?>" class="btn btn-primary">View</a>
                    <a href="edit.php?id=<?php echo $r['subscriber_id'] ?>" class="btn btn-warning">Edit</a>
                    <a href="delete.php?id=<?php echo $r['subscriber_id'] ?>" class="btn btn-danger" 
                    onclick="return confirm('Are you sure you want to delete this subscriber?');" >Delete</a>

                </td>
            </tr>
        <?php } ?>
</table>
        </div>
<?php require_once 'includes/footer.php'; ?>