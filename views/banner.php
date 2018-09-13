<div class="cadnew">
    <a href="<?php echo BASE_URL; ?>banner/addBanner"><div class="btn-new">NOVO +</div>
    
</div>
<table id="tablebanner" class="display">
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
                <td><img src="<?php echo BASE_URL; ?>assets/images/uploads/banners/<?php echo $item['image']; ?>" class="imagesTable"></td>
                <td><?php echo $item['name']; ?></td>
                <td>
                    <a href="<?php echo BASE_URL; ?>banner/delBanner/<?php echo $item['id']; ?>" style="color:#232830" title="Excluir"><i class="far fa-trash-alt"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
            
        </tbody>
        
    </table>