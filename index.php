<?php

require_once('config/db.php'); //Database Connection

$limit = 10; //Limit of records per page
$page = isset($_GET['page']) ? $_GET['page'] : 1; //Fetch Page Number from Link
$prevPage = $page - 1;
$nextPage = $page + 1;
$start = ($page - 1) * $limit; 

$searchKeyword = isset($_GET['search']) ? $_GET['search'] : ''; //Fetch Search Keyword

$query = "SELECT * FROM `ems_data`"; //Fetch All Records

$query .= " WHERE "; //Search Query
$columns = array('name', 'age', 'position', 'bday', 'gender', 'status', 'email', 'number', 'salary', 'endcontract');
foreach ($columns as $column) {
    $query .= "$column LIKE '%$searchKeyword%' OR ";
} //Looping the search query array
$query = rtrim($query, ' OR '); //Remove the last OR in the query


$query .= " LIMIT $start, $limit";

$result = mysqli_query($con, $query);

$totalRecordsQuery = "SELECT COUNT(*) as total FROM `ems_data` WHERE ";
foreach ($columns as $column) {
    $totalRecordsQuery .= "$column LIKE '%$searchKeyword%' OR ";
}
$totalRecordsQuery = rtrim($totalRecordsQuery, ' OR ');

$totalRecordsResult = mysqli_query($con, $totalRecordsQuery);
$totalRecordsData = mysqli_fetch_assoc($totalRecordsResult); 
$totalRecords = $totalRecordsData['total']; //Count the # of Total Records

$totalPages = ceil($totalRecords / $limit);  //Calculate Total Pages
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!---------------------- CSS files for font, bootstrap, and SWAL -------------------->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.css">
    <title>EMS | Josiah Lopez</title>
</head>
<body>
<div class="content">
    <div class="container-xl">
		<div class="mb-5"></div>
        <h2 class="mb-5">Employee Management System</h2>
		<div class="row">
			<div class="col-lg-3 float-lg-end">
				<form action="" method="GET" class="mb-3" id="searchForm">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search" name="search">
						<button class="btn btn-outline-primary" type="submit">Search</button>
					</div>
				</form>
			</div>
		</div>

		<!---------------------- Employee Table -------------------->

		
		<div class="row">
			<div class="table-responsive">
				<table id="employeeTable" class="table table-hover custom-table" style="overflow-x: auto; white-space: nowrap;">
					<thead>
					<tr>
						<th scope="col">Name</th>
						<th scope="col">Age</th>
						<th scope="col">Position</th>
						<th scope="col">Birthdate</th>
						<th scope="col">Gender</th>
						<th scope="col">Civil Status</th>
						<th scope="col">Email</th>
						<th scope="col">Contact No.</th>
						<th scope="col">Salary</th>
						<th scope="col">Contract</th>
						<th scope="col">Action</th>
					</tr>
					</thead>
					<tbody>
						
					<?php
					while ($row = mysqli_fetch_assoc($result)) {
					?>
						<tr>

							<!---------------------- READ Employee Data -------------------->

							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['age']; ?></td>
							<td><?php echo $row['position']; ?></td>
							<td><?php echo $row['bday']; ?></td>
							<td><?php echo $row['gender']; ?></td>
							<td><?php echo $row['status']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['number']; ?></td>
							<td><?php echo $row['salary']; ?></td>
							<td><?php echo $row['endcontract']; ?></td>
							<td>
								<div class="text-center">



									<!---------------------- UPDATE Employees -------------------->

									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#up-<?php echo $row['id']?>">
										Update
									</button>

									<div class="modal fade" id="up-<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLongTitle">Update Information</h5>
        											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</button>
												</div>
												
												<form method="post" name="update-<?php echo $row['id']?>">
													<div class="modal-body">
														<div class="form-group mb-3">
															<label for="name-<?php echo $row['id']?>">Name</label>
															<input type="text" class="form-control" id="name-<?php echo $row['id']?>" 
															data-bs-toggle="popover" data-bs-content="Name cannot be empty!" value="<?php echo $row['name']; ?>">
														</div>
														<div class="form-group mb-3">
															<label for="pos-<?php echo $row['id']?>">Position</label>
															<select class="form-control" id="pos-<?php echo $row['id']?>">
																<option value="CEO" <?php if($row['position'] == "CEO") echo 'selected'; ?>>CEO</option>
																<option value="CFO" <?php if($row['position'] == "CFO") echo 'selected'; ?>>CFO</option>
																<option value="CMO" <?php if($row['position'] == "CMO") echo 'selected'; ?>>CMO</option>
																<option value="COO" <?php if($row['position'] == "COO") echo 'selected'; ?>>COO</option>
																<option value="Human Resources" <?php if($row['position'] == "Human Resources") echo 'selected'; ?>>Human Resources</option>
																<option value="IT Manager" <?php if($row['position'] == "IT Manager") echo 'selected'; ?>>IT Manager</option>
																<option value="Marketing Manager" <?php if($row['position'] == "Marketing Manager") echo 'selected'; ?>>Marketing Manager</option>
																<option value="Product Manager" <?php if($row['position'] == "Product Manager") echo 'selected'; ?>>Product Manager</option>
																<option value="Sales Manager" <?php if($row['position'] == "Sales Manager") echo 'selected'; ?>>Sales Manager</option>
																<option value="Admin Assistant" <?php if($row['position'] == "Admin Assistant") echo 'selected'; ?>>Admin Assistant</option>
																<option value="Accountant" <?php if($row['position'] == "Accountant") echo 'selected'; ?>>Accountant</option>
																<option value="Bookkeeper" <?php if($row['position'] == "Bookkeeper") echo 'selected'; ?>>Bookkeeper</option>
																<option value="Business Analyst" <?php if($row['position'] == "Business Analyst") echo 'selected'; ?>>Business Analyst</option>
																<option value="Sales Representative" <?php if($row['position'] == "Sales Representative") echo 'selected'; ?>>Sales Representative</option>
																<option value="Jr Software Engineer" <?php if($row['position'] == "Jr Software Engineer") echo 'selected'; ?>>Jr Software Engineer</option>
																<option value="Sr Software Engineer" <?php if($row['position'] == "Sr Software Engineer") echo 'selected'; ?>>Sr Software Engineer</option>
															</select>
														</div>
														<div class="form-group mb-3">
															<label for="bday-<?php echo $row['id']?>">Birthdate</label>
															<input type="date" class="form-control" id="bday-<?php echo $row['id']?>" 
															data-bs-toggle="popover" data-bs-content="Invalid Birthdate!" value="<?php echo $row['bday']; ?>"
															max="<?php echo date('Y-m-d');?>">
														</div>
														<div class="form-group mb-3">
															<label for="gender-<?php echo $row['id']?>">Gender</label>
															<select class="form-control" id="gender-<?php echo $row['id']?>">
																<option value="Male" <?php if($row['gender'] == "Male") echo 'selected'; ?>>Male</option>
																<option value="Female" <?php if($row['gender'] == "Female") echo 'selected'; ?>>Female</option>
															</select>
														</div>
														<div class="form-group mb-3">
															<label for="status-<?php echo $row['id']?>">Civil Status</label>
															<select class="form-control" id="status-<?php echo $row['id']?>">
																<option value="Single" <?php if($row['status'] == "Single") echo 'selected'; ?>>Single</option>
																<option value="Married" <?php if($row['status'] == "Married") echo 'selected'; ?>>Married</option>
																<option value="Separated" <?php if($row['status'] == "Separated") echo 'selected'; ?>>Separated</option>
																<option value="Widowed" <?php if($row['status'] == "Widowed") echo 'selected'; ?>>Widowed</option>
															</select>
														</div>
														<div class="form-group mb-3">
															<label for="email-<?php echo $row['id']?>">Email</label>
															<input type="email" class="form-control" id="email-<?php echo $row['id']?>" 
															data-bs-toggle="popover" data-bs-content="Invalid Email!" value="<?php echo $row['email']; ?>">
														</div>
														<div class="form-group mb-3">
															<label for="number-<?php echo $row['id']?>">Phone Number</label>
															<input type="text" class="form-control" id="number-<?php echo $row['id']?>" 
															data-bs-toggle="popover" data-bs-content="Invalid Phone Number (Must be in 09... format)!" value="<?php echo $row['number']; ?>">
														</div>
														<div class="form-group mb-3">
															<label for="salary-<?php echo $row['id']?>">Salary</label>
															<input type="text" class="form-control" id="salary-<?php echo $row['id']?>" 
															data-bs-toggle="popover" data-bs-content="Salary should be a valid number!" value="<?php echo $row['salary']; ?>">
														</div>
														<div class="form-group mb-3">
															<label for="endcontract-<?php echo $row['id']?>">End of Contract Agreement</label>
															<input type="date" class="form-control" id="endcontract-<?php echo $row['id']?>" 
															data-bs-toggle="popover" data-bs-content="Invalid Contract Date!" value="<?php echo $row['endcontract']; ?>"
															min="<?php echo date('Y-m-d');?>">
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
														<button type="button" id="save" class="btn btn-primary">Save changes</button>
													</div>
												</form>

											</div>
										</div>
									</div>


									<!---------------------- DELETE Employees -------------------->
									
									<button type="button" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#del-<?php echo $row['id']?>"
											value="<?php echo $row['id'] ?>">X
									</button>

									<div class="modal fade" id="del-<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLongTitle">Delete Employee Details</h5>
        											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</button>
												</div>
												<div class="modal-body">
													<p>Are you sure you want to delete this employee's information?</p>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
													<button type="button" id="delete" value="<?php echo $row['id']?>" class="btn btn-danger">Delete</button>
												</div>
											</div>
										</div>
									</div>
								</div>

							</td>
						</tr>
					<?php
					}
					?>

					</tbody>
				</table>

				<!---------------------- Pagination -------------------->

				<nav>
					<ul class="pagination">
						<li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
							<a class="page-link" href="<?php if($page <= 1){ echo '#'; } else { echo "?page=$prevPage&search=$searchKeyword"; } ?>">Previous</a>
						</li>

						<?php for ($i = 1; $i <= $totalPages; $i++) { ?>
							<li class="page-item <?php if($i == $page) { echo 'active'; } ?>">
								<a class="page-link" href="?page=<?php echo $i; ?>&search=<?php echo $searchKeyword; ?>"><?php echo $i; ?></a>
							</li>
						<?php } ?>

						<li class="page-item <?php if($page >= $totalPages){ echo 'disabled'; } ?>">
							<a class="page-link" href="<?php if($page >= $totalPages){ echo '#'; } else { echo "?page=$nextPage&search=$searchKeyword"; } ?>">Next</a>
						</li>
					</ul>
				</nav>

				<!---------------------- CREATE New Employee Details -------------------->

				<div class="text-center">
					<button type="button" class="btn btn-primary btn-lg btn-block"
					data-bs-toggle="modal" data-bs-target="#create">Add New Employee Details</button>
				</div>

				<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle">Add New Employee Details</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</button>
							</div>	

							<!-- Add Employee Details Form -->
							<form method="post" name="addEmployee">
								<div class="modal-body">
									<div class="form-group mb-3">
										<label for="nameAdd">Name</label>
										<input type="text" class="form-control" id="nameAdd" placeholder="Type Name Here">
									</div>
									<div class="form-group mb-3">
										<label for="posAdd">Position</label>
										<select class="form-control" id="posAdd">
											<option value="" selected disabled>Select Employee's Position</option>
											<option value="CEO">CEO</option>
											<option value="CFO">CFO</option>
											<option value="CMO">CMO</option>
											<option value="COO">COO</option>
											<option value="Human Resources">Human Resources</option>
											<option value="IT Manager">IT Manager</option>
											<option value="Marketing Manager">Marketing Manager</option>
											<option value="Product Manager">Product Manager</option>
											<option value="Sales Manager">Sales Manager</option>
											<option value="Admin Assistant">Admin Assistant</option>
											<option value="Accountant">Accountant</option>
											<option value="Bookkeeper">Bookkeeper</option>
											<option value="Business Analyst">Business Analyst</option>
											<option value="Sales Representative">Sales Representative</option>
											<option value="Jr Software Engineer">Jr Software Engineer</option>
											<option value="Sr Software Engineer">Sr Software Engineer</option>
										</select>
									</div>
									<div class="form-group mb-3">
										<label for="bdayAdd">Birthdate</label>
										<input type="date" class="form-control" id="bdayAdd" placeholder="Select Birthdate"
										max="<?php echo date('Y-m-d');?>">
									</div>
									<div class="form-group mb-3">
										<label for="genderAdd">Gender</label>
										<select class="form-control" id="genderAdd">
											<option value="" selected disabled>Select Employee's Gender</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
										</select>
									</div>
									<div class="form-group mb-3">
										<label for="statusAdd">Civil Status</label>
										<select class="form-control" id="statusAdd">
											<option value="" selected disabled>Select Civil Status</option>
											<option value="Single">Single</option>
											<option value="Married">Married</option>
											<option value="Separated">Separated</option>
											<option value="Widowed">Widowed</option>
										</select>
									</div>
									<div class="form-group mb-3">
										<label for="emailAdd">Email</label>
										<input type="email" class="form-control" id="emailAdd" placeholder="Type Valid Email Here">
									</div>
									<div class="form-group mb-3">
										<label for="numberAdd">Phone Number</label>
										<input type="text" class="form-control" id="numberAdd" placeholder="Type Valid Phone Number in 09... format">
									</div>
									<div class="form-group mb-3">
										<label for="salaryAdd">Salary</label>
										<input type="text" class="form-control" id="salaryAdd" placeholder="Type Salary With Only Up to 2 Decimals">
									</div>
									<div class="form-group mb-3">
										<label for="endcontractAdd">End of Contract Agreement</label>
										<input type="date" class="form-control" id="endcontractAdd" placeholder="Select Contract End Date"
										min="<?php echo date('Y-m-d');?>">
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
									<button type="button" id="add" class="btn btn-primary">Add Details</button>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
    </div>
</div>

<!---------------------- Scripts (All Opensourced Scripts) -------------------->

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.all.min.js"></script> 

</body>
</html>
<!---------------------- JavaScript for Popovers and AJAX Requests -------------------->
<script> 

	$(document).ready(function() {
		$('[data-toggle="popover"]').popover();
	});

	// Update Employee Information
	$(document).on('click', '#save', function() {
		var dateRegex = /^\d{4}-\d{2}-\d{2}$/;
		var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
		var numberRegex = /^09[0-9]{9}$/;
		var salaryRegex = /^[0-9]+(\.[0-9]{1,2})?$/;
		var form = this.closest('form');
		var id = form.getAttribute('name').split('-')[1];
		var name = document.getElementById('name-'+id).value;
		var pos = document.getElementById('pos-'+id).value;
		var bday = new Date(document.getElementById('bday-'+id).value);
		var gender = document.getElementById('gender-'+id).value;
		var status = document.getElementById('status-'+id).value;
		var email = document.getElementById('email-'+id).value;
		var number = document.getElementById('number-'+id).value;
		var salary = parseFloat(document.getElementById('salary-'+id).value);
		var endcontract = document.getElementById('endcontract-'+id).value;
		var today = new Date();
		var age = today.getFullYear() - bday.getFullYear(); //Calculate Age
		var m = today.getMonth() - bday.getMonth(); //Calculate Month
        let validationPassed = true; //Set default value of condition to true
		var bday = document.getElementById('bday-'+id).value;

		if (m < 0 || (m === 0 && today.getDate() < bday.getDate())) {
			age--;
		} //If the month is less than 0 or the month is equal to 0 and the date is less than the birthdate, then the age is decremented by 1

		if (name === '') {
			$('#name-'+id).popover('show');
			validationPassed = false;
		}

		if (bday === '' || !dateRegex.test(bday)) {
			$('#bday-'+id).popover('show');
			validationPassed = false;
		}


		if (email === '' || !emailRegex.test(email)) {
			$('#email-'+id).popover('show');
			validationPassed = false;
		}

		if (number === '' || !numberRegex.test(number)) {
			$('#number-'+id).popover('show');
			validationPassed = false;
		}

		if (salary === '' || !salaryRegex.test(salary)) {
			$('#salary-'+id).popover('show');
			validationPassed = false;
		}

		if (endcontract === '' || !dateRegex.test(endcontract)) {
			$('#endcontract-'+id).popover('show');
			validationPassed = false;
		}

		if(validationPassed) {
			$.ajax({
				url: 'config/update.php',
				type: 'POST',
				data: {
					id: id,
					name: name,
					age: age,
					position: pos,
					email: email,
					salary: salary,
					bday: bday,
					gender: gender,
					status: status,
					number: number,
					endcontract: endcontract
				}, //Data to be sent to the AJAX Request
				cache: false,
				success: function(data) {
					Swal.fire({
						icon: 'success',
						title: 'Success',
						text: 'Employee information updated successfully!',
						allowOutsideClick: false
					}).then((result) => {
						if (result.isConfirmed) {
							location.reload();
						}
					})
				} //Success Message Using SWAL
			}) //AJAX Request For Updating Employee Information
		}
	});

	$(document).on('click', '#delete', function() {
		var id = $(this).val();

		$.ajax({
			url: 'config/delete.php',
			type: 'POST',
			data: {
				id: id
			}, //Data to be sent to the AJAX Request
			cache: false,
			success: function(data) {
				Swal.fire({
					icon: 'warning',
					title: 'Deleted',
					text: 'Employee information is deleted!',
					allowOutsideClick: false
				}).then((result) => {
					if (result.isConfirmed) {
						location.reload();
					}
				})
			} //Success Message Using SWAL
		}) //AJAX Request For Deleting Employee Information
	});

	

	$(document).on('click', '#add', function() {
		var dateRegex = /^\d{4}-\d{2}-\d{2}$/;
		var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
		var numberRegex = /^09[0-9]{9}$/;
		var salaryRegex = /^[0-9]+(\.[0-9]{1,2})?$/;
		var name = document.getElementById('nameAdd').value;
		var pos = document.getElementById('posAdd').value;
		var bday = new Date(document.getElementById('bdayAdd').value);
		var gender = document.getElementById('genderAdd').value;
		var status = document.getElementById('statusAdd').value;
		var email = document.getElementById('emailAdd').value;
		var number = document.getElementById('numberAdd').value;
		var salary = parseFloat(document.getElementById('salaryAdd').value);
		var endcontract = document.getElementById('endcontractAdd').value;
		var today = new Date();
		var age = today.getFullYear() - bday.getFullYear(); //Calculate Age
		var m = today.getMonth() - bday.getMonth(); //Calculate Month
        let validationPassed = true;
		var bday = document.getElementById('bdayAdd').value;

		if (m < 0 || (m === 0 && today.getDate() < bday.getDate())) {
			age--;
		} //If the month is less than 0 or the month is equal to 0 and the date is less than the birthdate, then the age is decremented by 1

		if (name === '') {
			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Name cannot be empty!',
				allowOutsideClick: false
			})
			validationPassed = false;
		}

		if (bday === '' || !dateRegex.test(bday)) {
			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Invalid Birthdate!',
				allowOutsideClick: false
			})
			validationPassed = false;
		}


		if (email === '' || !emailRegex.test(email)) {
			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Invalid Email Format!',
				allowOutsideClick: false
			})
			validationPassed = false;
		}

		if (number === '' || !numberRegex.test(number)) {
			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Invalid Phone Number Format Should be in 09.... format!',
				allowOutsideClick: false
			})
			validationPassed = false;
		}

		if (salary === '' || !salaryRegex.test(salary)) {
			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Invalid Salary!',
				allowOutsideClick: false
			})
			validationPassed = false;
		}

		if (endcontract === '' || !dateRegex.test(endcontract)) {
			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Invalid Contract Date!',
				allowOutsideClick: false
			})
			validationPassed = false;
		}

		if(validationPassed){
			$.ajax({
				url: 'config/add.php',
				type: 'POST',
				data: {
					name: name,
					age: age,
					position: pos,
					email: email,
					salary: salary,
					bday: bday,
					gender: gender,
					status: status,
					number: number,
					endcontract: endcontract
				}, //Data to be sent to the AJAX Request
				cache: false,
				success: function(data) {
					Swal.fire({
						icon: 'success',
						title: 'Success',
						text: 'Employee information is added to the database!',
						allowOutsideClick: false
					}).then((result) => {
						if (result.isConfirmed) {
							location.reload();
						}
					})
				} // Success Message Using SWAL
			}) // AJAX Request For Adding Employee Information
		}
	});

</script>


