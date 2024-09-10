<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            width: 90%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            justify-content: flex-start;
            gap: 10px;
            margin-bottom: 20px;
        }

        .header button {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .header .add-btn {
            background-color: #28a745;
            color: white;
        }

        .header .profile-btn, .header .logout-btn {
            background-color: #6c757d;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        table th {
            background-color: #f8f9fa;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .action-btns {
            display: flex;
            gap: 10px;
        }

        .action-btns .edit-btn {
            background-color: #007bff;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .action-btns .delete-btn {
            background-color: #dc3545;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .back-to-top {
            margin-top: 20px;
            text-align: right;
        }

        .back-to-top a {
            color: #007bff;
            text-decoration: none;
        }

        .back-to-top a:hover {
            text-decoration: underline;
        }

        .btn {
    display: inline-block;
    padding: 10px 15px;
    background-color: #28a745;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-size: 14px;
    text-align: center;
    cursor: pointer;
}

.btn:hover {
    background-color: #218838;
}
.profile-btn{
    background-color: #e74c3c;
}


    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="?act=add" class="btn">Add new article</a>
            <a href="?act=profile" class="btn profile-btn">Profile</a>
            <a href="#" class="btn">Logout</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                 <?php foreach ($articles as $article): ?>
                    <thead>
                <tr>
                    <th><?php echo $article['id']; ?></th>
                    <th><?php echo $article['title']; ?></th>
                    <th><?php echo $article['createdAt']; ?></th>
                    <td>
                        <div class="action-btns">
                        <a href="?act=edit&id=<?php echo $article['id']?>" class="btn">Edit</a>
                        <a href="?act=delete&id=<?php echo $article['id']?>" class="btn">Delete</a>
                        </div>
                    </td>
                </tr>
            </thead>
            <?php endforeach; ?>
            </tbody>

        </table>

        <div class="back-to-top">
            <a href="#">Back to top</a>
        </div>
    </div>
</body>
</html>
