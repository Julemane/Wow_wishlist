<?php ob_start(); ?>
<div id="userListArea" class="col-lg-10">
  <table id="wishlist" class="table table-responsive-sm table-dark">
  <thead>
    <tr>
      <th>Icone</th>
      <th>Id de l'item</th>
      <th>Nom de l'item</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      while($item = $wishlist->fetch()){
echo '<tr class="item' . $item['itemId'] . '">'; ?>
       <td><img class='itemImg'/></td>
       <td class="itemId"><?php echo $item['itemId']; ?></td>
       <td class="itemName"></td>
       <td>
          <form action="?page=deleteItem&amp;itemId=<?php echo $item['itemId']; ?>"  method="post"
          ><button class="btn btn-light" type="submit" onclick="return confirm('Etes vous sur de vouloir supprimer cet objet ?')">Supprimer</button>
          </form>
      </td>
    </tr>
    <?php
      }
    ?>
  </tbody>
</table>
<p>
<?php if(isset($info)){
    echo $info;
  }
  ?>
</p>
<!--Area appear hover IMG-->
<div id="itemDetailList">
  <h4 id="itemName"></h4>
    <ul id=itemStats>
      <li id="itemLvl"></li>
      <li id="bind"></li>
      <li id="armor"></li>
      <!--Stats Bonus area-->
      <li id="durability"></li>
      <li id="itemLvlRequiered"></li>
    </ul>
</div>
</div>
<script>


$(document).ready(function(){

  $.extend( true, $.fn.dataTable.defaults, {
    "searching": false,
    "ordering": false
} );

   $('#wishlist').DataTable({
        "rowCallback": fillRow,
        "lengthMenu": [[4, 8], [4, 8]],
        "pagingType": "simple",
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
        },
    });
});


</script>

<?php $content = ob_get_clean(); ?>
<?php require('template/template.php'); ?>
