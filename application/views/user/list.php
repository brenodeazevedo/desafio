<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('base/header');
$this->load->view('base/menuAdmin');
?>
<div class="card main-container">
    <div class="card-body">
        <h5 class="card-title">Lista de usuários</h5>
        <nav aria-label="Paginação">
            <ul class="pagination">
                <li class="page-item <?php echo $actualPage == 1 ? "disabled" : "" ?>">
                    <a href="/users?page=<?php echo $actualPage - 1 ?>" class="page-link">Anterior</a>
                </li>
                <?php foreach ($pages as $page) : ?>
                    <li class="page-item <?php echo $actualPage == $page ? "active" : "" ?>">
                        <a href="/users?page=<?php echo $page ?>" class="page-link"><?php echo $page ?></a>
                    </li>
                <?php endforeach; ?>
                <li class="page-item <?php echo $actualPage == count($pages) ? "disabled" : "" ?>">
                    <a href="/users?page=<?php echo $actualPage + 1 ?>" class="page-link">Próxima</a>
                </li>
            </ul>
        </nav>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Email</th>
                        <th>Data de nascimento</th>
                        <th>Data/Hora de cadastro</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?php echo $user->id ?></td>
                            <td><?php echo $user->firstName ?></td>
                            <td><?php echo $user->lastName ?></td>
                            <td><?php echo $user->email ?></td>
                            <td><?php echo date_format(date_create($user->birthdate), "d/m/Y") ?></td>
                            <td><?php echo date_format(date_create($user->createdAt), "d/m/Y H:i") ?></td>
                            <td>
                                <a href="javascript:confirmarDelecao(<?php echo $user->id ?>)" class="btn btn-danger"><i class="fas fa-user-minus"></i></a>
                                <a href="/users/edit/<?php echo $user->id ?>" class="btn btn-info"><i class="fas fa-user-edit"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<script>
    function confirmarDelecao(id) {
        if (window.confirm('Deseja realmente deletar o usuário?')) {
            window.location.href = "/users/remove/" + id;
        }
    }
</script>

<?php $this->load->view('base/footer'); ?>