<!DOCTYPE html>
<html>
<head>
    <title>Create Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: radial-gradient(circle at top, #fff176, #ff9800 45%, #1976d2);
            font-family: 'Comic Sans MS', cursive, sans-serif;
        }

        .form-card {
            max-width: 600px;
            margin: 70px auto;
            background: #fff8dc;
            border: 6px solid #111;
            border-radius: 30px;
            box-shadow: 12px 12px 0 #111;
            padding: 35px;
        }

        .title {
            color: #d50000;
            text-shadow: 3px 3px #ffeb3b;
            font-weight: bold;
        }

        .btn-looney {
            background: #d50000;
            color: white;
            border: 3px solid #111;
            border-radius: 20px;
            font-weight: bold;
        }

        .btn-looney:hover {
            background: #ffeb3b;
            color: #111;
        }

        input {
            border: 3px solid #111 !important;
            border-radius: 15px !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-card">
            <h1 class="title text-center mb-4">Create Profile</h1>

            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="/profiles/store" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label class="form-label fw-bold">Name</label>
                    <input type="text" name="name" class="form-control" value="<?= old('name') ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Email</label>
                    <input type="email" name="email" class="form-control" value="<?= old('email') ?>" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Avatar</label>
                    <input type="file" name="avatar" class="form-control" accept="image/*" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-looney px-4">Upload Profile</button>
                    <a href="/profiles" class="btn btn-dark px-4">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>