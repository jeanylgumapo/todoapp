<template>
    <div>
        <!-- As a heading -->
        <nav class="navbar navbar-dark bg-dark text-light">
        <span class="navbar-brand mb-0 h1">Navbar</span>
        </nav>
        <!-- This is Index Dashboard{{fname}} -->
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Assigned To</th>
                    <th scope="col">Date Completed</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>@mdo</td>
                    </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td> <div class="form-group">
                            <input type="text" class="form-control" placeholder="Input Your Task">
                        </div>
                    </td>
                    <td> <div class="form-group">
                            <input type="text" class="form-control" placeholder="Select Assignee">
                        </div>
                    </td>
                    <td> Date Completed
                    </td>
                    <td><button type="button" class="btn btn-primary">+</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
    </div>
</template>
<script>

export default {
//  props: ['fname', 'lname'],
}
</script>