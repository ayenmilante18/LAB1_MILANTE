<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>

        .custom-container {
            background-color: #D0E7D2;
            border: 1px solid black;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0.5, 0.5);
        }

        .custom-table {
            border-collapse: collapse;
            width: 100%;
        }

        .custom-table th, .custom-table td {
            border: 3px solid black;
            padding: 10px;
            text-align: center;
        }

        .custom-table th:first-child {
            border-top: 3px solid black;
        }

        .custom-button {
            background-color: #1A5D1A;
            border-color: #0F0E0E;
            color: #FFFFFF;
        }

        .custom-button-delete {
            background-color: #464E2E;
            border-color: #0F0E0E;
            color: #FFFFFF;
        }
    </style>
</head>

<body style="background-color: #B0D9B1;">
    <div class="container mt-5 col-md-6 custom-container">
        <h2>Add Student</h2>
        <form action="/save" method="post">
            <div class="form-group">
                <label for="StudName">Student Name</label>
                <input type="hidden" class="form-control" id="id" name="id" placeholder="id" value="<?= isset($pro['id']) ? $pro['id'] : '' ?>">
                <input type="text" class="form-control" id="StudName" name="StudName" placeholder="Enter Student Name" value="<?= isset($pro['StudName']) ? $pro['StudName'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="StudGender">Student Gender</label>
                <select class="form-control" id="StudGender" name="StudGender">
                    <option value="Male" <?= (isset($pro['StudGender']) && $pro['StudGender'] === 'Male') ? 'selected' : '' ?>>Male</option>
                    <option value="Female" <?= (isset($pro['StudGender']) && $pro['StudGender'] === 'Female') ? 'selected' : '' ?>>Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="StudCourse">Student Course</label>
                <select class="form-control" id="StudCourse" name="StudCourse">
                    <option value="BSIT" <?= (isset($pro['StudCourse']) && $pro['StudCourse'] === 'BSIT') ? 'selected' : '' ?>>BSIT</option>
                    <option value="BSHM" <?= (isset($pro['StudCourse']) && $pro['StudCourse'] === 'BSHM') ? 'selected' : '' ?>>BSHM</option>
                    <option value="BSTM" <?= (isset($pro['StudCourse']) && $pro['StudCourse'] === 'BSTM') ? 'selected' : '' ?>>BSTM</option>
                    <option value="BSED" <?= (isset($pro['StudCourse']) && $pro['StudCourse'] === 'BSED') ? 'selected' : '' ?>>BSED</option>
                    <option value="BSCrim" <?= (isset($pro['StudCourse']) && $pro['StudCourse'] === 'BSCrim') ? 'selected' : '' ?>>BSCrim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="StudSection">Student Section</label>
                <select class="form-control" id="StudSection" name="StudSection">
                    <option value="F1" <?= (isset($pro['StudSection']) && $pro['StudSection'] === 'F1') ? 'selected' : '' ?>>F1</option>
                    <option value="F2" <?= (isset($pro['StudSection']) && $pro['StudSection'] === 'F2') ? 'selected' : '' ?>>F2</option>
                    <option value="F3" <?= (isset($pro['StudSection']) && $pro['StudSection'] === 'F3') ? 'selected' : '' ?>>F3</option>
                    <option value="F4" <?= (isset($pro['StudSection']) && $pro['StudSection'] === 'F4') ? 'selected' : '' ?>>F4</option>
                    <option value="F5" <?= (isset($pro['StudSection']) && $pro['StudSection'] === 'F5') ? 'selected' : '' ?>>F5</option>
                </select>
            </div>
            <div class="form-group">
                <label for="StudYear">Student Year</label>
                <select class="form-control" id="StudYear" name="StudYear">
                    <option value="1st year" <?= (isset($pro['StudYear']) && $pro['StudYear'] === '1st year') ? 'selected' : '' ?>>1st year</option>
                    <option value="2nd year" <?= (isset($pro['StudYear']) && $pro['StudYear'] === '2nd year') ? 'selected' : '' ?>>2nd year</option>
                    <option value="3rd year" <?= (isset($pro['StudYear']) && $pro['StudYear'] === '3rd year') ? 'selected' : '' ?>>3rd year</option>
                    <option value="4th year" <?= (isset($pro['StudYear']) && $pro['StudYear'] === '4th year') ? 'selected' : '' ?>>4th year</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary custom-button">Save</button>
        </form>
    </div>

    <div class="container mt-5 custom-container">
        <h2>Student Listing</h2>
        <ul>
            <?php foreach ($product as $pr): ?>
                <li>
                    <strong>Student Name:</strong> <?= $pr['StudName'] ?><br>
                    <strong>Student Gender:</strong> <?= $pr['StudGender'] ?><br>
                    <strong>Student Course:</strong> <?= $pr['StudCourse'] ?><br>
                    <strong>Student Section:</strong> <?= $pr['StudSection'] ?><br>
                    <strong>Student Year:</strong> <?= $pr['StudYear'] ?><br>
                    <a href="/delete/<?= $pr['id'] ?>" class="btn btn-danger btn-sm custom-button-delete">
                        <i class="fas fa-trash"></i> Delete
                    </a>
                    <a href="/edit/<?= $pr['id'] ?>" class="btn btn-primary btn-sm custom-button">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
