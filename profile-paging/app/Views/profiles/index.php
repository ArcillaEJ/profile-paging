<!DOCTYPE html>
<html>
<head>
    <title>Profile Picture & Paging</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: radial-gradient(circle at top, #fff176, #ff9800 45%, #1976d2);
            font-family: 'Comic Sans MS', cursive, sans-serif;
            padding: 40px 0;
        }

        .main-card {
            max-width: 1000px;
            margin: auto;
            background: #fff8dc;
            border: 7px solid #111;
            border-radius: 35px;
            box-shadow: 14px 14px 0 #111;
            padding: 40px;
        }

        .title {
            color: #d50000;
            text-shadow: 3px 3px #ffeb3b;
            font-size: 3rem;
            font-weight: bold;
        }

        .btn-looney {
            background: #d50000;
            color: white;
            border: 3px solid #111;
            border-radius: 20px;
            font-weight: bold;
            padding: 10px 25px;
        }

        .btn-looney:hover {
            background: #ffeb3b;
            color: #111;
        }

        table {
            background: white;
            border: 4px solid #111 !important;
            overflow: hidden;
        }

        th {
            background: #1976d2 !important;
            color: white !important;
            text-align: center;
            font-size: 1.2rem;
        }

        td {
            vertical-align: middle;
            text-align: center;
            font-size: 1.1rem;
        }

        .avatar-img {
            width: 95px;
            height: 95px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid #d50000;
        }

        .pagination {
            justify-content: center;
            gap: 12px;
            margin-top: 30px;
        }

        .pagination li {
            list-style: none;
        }

        .pagination li a,
        .pagination li span {
            padding: 10px 18px;
            border: 3px solid #111;
            border-radius: 15px;
            background: #ffeb3b;
            color: #111;
            font-weight: bold;
            text-decoration: none;
            transition: 0.2s;
        }

        .pagination li a:hover {
            background: #d50000;
            color: white;
        }

        .pagination .active a,
        .pagination .active span {
            background: #d50000;
            color: white;
        }

        .search-box input {
            border: 3px solid #111;
            border-radius: 15px;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="main-card">

        <h1 class="title text-center mb-5">
            Profile Picture & Paging
        </h1>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success text-center fw-bold">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <div class="text-center mb-4">
            <a href="/profiles/create" class="btn btn-looney">
                Create New Profile
            </a>
        </div>

        <form method="get" action="/profiles" class="row justify-content-center mb-4 search-box">

            <div class="col-md-5">
                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Search name or email"
                    value="<?= esc($search ?? '') ?>"
                >
            </div>

            <div class="col-auto">
                <button type="submit" class="btn btn-dark">
                    Search
                </button>

                <a href="/profiles" class="btn btn-warning">
                    Reset
                </a>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">

                <thead>
                    <tr>
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>

                <tbody>

                <?php if (!empty($users)): ?>

                    <?php foreach ($users as $user): ?>

                        <tr>

                            <td>
                                <?php if ($user['avatar']): ?>

                                    <img
                                        src="/<?= esc($user['avatar']) ?>"
                                        class="avatar-img"
                                    >

                                <?php else: ?>

                                    No Image

                                <?php endif; ?>
                            </td>

                            <td>
                                <?= esc($user['name']) ?>
                            </td>

                            <td>
                                <?= esc($user['email']) ?>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>
                        <td colspan="3">
                            No users found.
                        </td>
                    </tr>

                <?php endif; ?>

                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            <?= $pager->links() ?>
        </div>

    </div>
</div>

</body>
</html>