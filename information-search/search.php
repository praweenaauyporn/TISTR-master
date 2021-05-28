
<?php
$connect = mysqli_connect("localhost", "root", "12345678", "tistr");
$output = '';
if (isset($_POST["query"])) {
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "SELECT d1.emp_id, emp_name, emp_job, emp_agency, emp_contact, emp_email, ep_name, pbc_title, pbc_institute, pbc_position as max_count , COUNT('emp_name,pbc_title') as count_title ,  (SELECT COUNT(publication.pbc_title) FROM publication WHERE publication.pbc_title LIKE	'%" . $search . "%') as count_title_all , COUNT('emp_name,pbc_title')/(SELECT	COUNT(publication.pbc_title) FROM publication WHERE publication.pbc_title LIKE	'%" . $search . "%')*100 as percent_title  FROM master AS d1
	INNER JOIN experties AS d2
	ON  (d1.emp_id = d2.emp_id)
	INNER JOIN publication AS d3
	ON (d1.emp_id=d3.emp_id)
	WHERE pbc_title LIKE '%" . $search . "%'
	GROUP BY emp_name, emp_job, emp_agency, emp_contact, emp_email, ep_name, pbc_title, pbc_institute, pbc_position ";
}

$result = mysqli_query($connect, $query);
if (mysqli_num_rows($result) > 0) {
	$output .= '<div class="table-responsive">
					<table class="table table-light table-striped table-hover" id="datatable">
					<thead class="thead" style="color: #fff; background-color: #007bff; border-color: #a1c5ec;">
                            <th scope="col" nowrap>ชื่อ</th>
                            <th scope="col" nowrap>ตำแหน่งงาน</th>
                            <th scope="col" nowrap>สังกัด</th>
                            <th scope="col" nowrap>ติดต่อ</th>
							<th scope="col" nowrap>E-mail</th>
							<th scope="col" nowrap>ep_name</th>
							<th scope="col" nowrap>เรื่องที่ตีพิมพ์</th>
							<th scope="col" nowrap>pbc_institute</th>
							<th scope="col" nowrap>max_count</th>
							<th scope="col" nowrap>count_title</th>
							<th scope="col" nowrap>count_title_all</th>
							<th scope="col" nowrap>percent_title</th>
                        </thead>
						';
	while ($row = mysqli_fetch_array($result)) {
		$output .= '
			<tr>
				<td class="text-left" nowrap>' . $row["emp_name"] . '</td>
				<td class="text-left" nowrap>' . $row["emp_job"] . '</td>
				<td class="text-left" nowrap>' . $row["emp_agency"] . '</td>
				<td class="text-left" nowrap>' . $row["emp_contact"] . '</td>
				<td class="text-left" nowrap>' . $row["emp_email"] . '</td>
				<td class="text-left" >' . $row["ep_name"] . '</td>
				<td class="text-left" >' . $row["pbc_title"] . '</td>
				<td class="text-left" >' . $row["pbc_institute"] . '</td>
				<td class="text-left" >' .  $row["max_count"].'</td>
				<td class="text-left" >' .  $row["count_title"].'</td>
				<td class="text-left" >' .  $row["count_title_all"].'</td>
				<td class="text-left" >' .  $row["percent_title"].'%</td>
				
			</tr>
		';
	}
	$output .= '</table>';
	echo $output;
} else {
	echo '<center>';
	echo 'ไม่มีข้อมูล';
	echo '</center>';
}
