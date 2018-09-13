<div class="cadnew">
    <a href="<?php echo BASE_URL; ?>category/addCategory"><div class="btn-new">NOVO +</div>
    
</div>
<table id="tablePadrao" class="display" style="text-align: center;">
        <thead>
            <tr>
                <th>Cod</th>
                <th>Name</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista as $item): ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['name']; ?></td>
                <td>
                    <a href="<?php echo BASE_URL; ?>category/editCategorias/<?php echo $item['id']; ?>" style="color:#232830"><i class="fas fa-edit" title="Editar"></i></a>
                    <a href="<?php echo BASE_URL; ?>category/delCat/<?php echo $item['id']; ?>" style="color:#232830" title="Excluir"><i class="far fa-trash-alt"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
            
        </tbody>
        
    </table>