<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Village</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Add Village</h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('villages.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-md-3">
                    <label for="district" class="form-label">อำเภอ</label>
                    <select id="district" class="form-select" required>
                        <option value="">เลือกอำเภอ</option>
                        @foreach ($districts as $district)
                            <option value="{{ $district->id }}">{{ $district->name_th }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="sub_district" class="form-label">ตำบล</label>
                    <select id="sub_district" name="sub_district_id" class="form-select" required>
                        <option value="">เลือกตำบล</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="name" class="form-label">ชื่อหมู่บ้าน</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="col-md-3">
                    <label for="village_no" class="form-label">หมู่ที่</label>
                    <input type="number" name="village_no" class="form-control" required>
                </div>

                <div class="col-12 text-center mt-3">
                    <button type="submit" class="btn btn-primary py-2">เพิ่มหมู่บ้าน</button>
                </div>
            </div>
        </form>

        <h2 class="text-center mt-5">รายชื่อหมู่บ้าน</h2>
        <table class="table table-striped table-hover mt-4">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>อำเภอ</th>
                    <th>ตำบล</th>
                    <th>ชื่อหมู่บ้าน</th>
                    <th>หมู่ที่</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($villages as $village)
                    <tr>
                        <td>{{ $village->id }}</td>
                        <td>{{ $village->name_th }}</td>
                        <td>{{ $village->district_name }}</td>
                        <td>{{ $village->village_name }}</td>
                        <td>{{ $village->village_num }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $('#district').on('change', function() {
            var districtId = $(this).val();
            if (districtId) {
                $.ajax({
                    url: '/get-sub-districts/' + districtId,
                    type: "GET",
                    success: function(data) {
                        $('#sub_district').empty();
                        $.each(data, function(key, value) {
                            $('#sub_district').append('<option value="' + value.id + '">' +
                                value.name_th + '</option>');
                        });
                    }
                });
            }
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
