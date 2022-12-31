<?php
if (isset($_POST['ajukan'])) {
    $user = new User();
    $user = $user->getUser([
        'username' => $_SESSION['username']
    ]);

    $userEvents = [];

    foreach ($user['events'] as $event) {
        if ($event['slug'] == $_POST['event_id']) {
            $_SESSION['error'] = 'Kegiatan sudah diajukan';
            header('Location: ' . BASE_URL . '/?page=user/dataKegiatan');
            die;
        }
        $userEvents[] = [
            'slug' => $event['slug'],
            'status' => $event['status'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
    }

    array_push($userEvents, [
        'slug' => $_POST['event_id'],
        'status' => 'pen',
    ]);

    // var_dump($userEvents);
    // die;

    $user = new User();
    $user->updateUser(
        $_SESSION['username'],
        [
            'events' => $userEvents,
        ]
    );

    // Store File
    try {
        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', 'pdf');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = 'uploads/' . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    header("Location: " . BASE_URL . "/?page=user/dataKegiatan&uploadsuccess");
                } else {
                    echo "Your file is too big!";
                }
            } else {
                echo "There was an error uploading your file!";
            }
        } else {
            echo "You cannot upload files of this type!";
        }

        $_SESSION['success'] = 'Kegiatan berhasil diajukan';
        header('Location: ' . BASE_URL . '/?page=user/dataKegiatan');
    } catch (\Throwable $e) {
        $_SESSION['error'] = 'Kegiatan gagal diajukan';
    }
}
