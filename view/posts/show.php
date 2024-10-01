<?php view('partials/header'); ?>

<main class="container">
    <table class="table table-striped table-hoverable">
        <thead>
            <th>Title</th>
            <th>Description</th>
        </thead>
        <tbody>
            <tr>
                <td><?= $post->title ?></td>
                <td><?= $post->body ?></td>
            </tr>
        </tbody>
    </table>
</main>

<?php view('partials/footer'); ?>