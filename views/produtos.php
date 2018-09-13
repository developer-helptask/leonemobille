<div class="cadnew">
    <a href="<?php echo BASE_URL; ?>produtos/addProdutos"><div class="btn-new">NOVO +</div></a>
    
</div>


<table id="tablepadrao" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista as $item): ?>
            <tr>
                <td><img src="<?php echo BASE_URL; ?>assets/images/uploads/produtos/<?php echo $item['images']; ?>" class="imagesTable"></td>
                <td><?php echo $item['name']; ?></td>
                <td>
                    <a href="<?php echo BASE_URL; ?>produtos/delProd/<?php echo $item['id']; ?>" style="color:#232830" title="Excluir"><i class="far fa-trash-alt"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
            
        </tbody>
        
    </table>