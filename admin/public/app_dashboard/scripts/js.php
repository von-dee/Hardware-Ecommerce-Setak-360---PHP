<script>
    
        function delete_func(){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.value) {
                    document.myform.submit();
                }
            })
        }
    


        function toggle_div() {
            var old_cust = document.getElementById("old_cust");
            var new_cust = document.getElementById("new_cust");									

            if (old_cust.style.display === "block" && new_cust.style.display === "none") {
                old_cust.style.display = "none";
                new_cust.style.display = "block";
                document.getElementById('customer_btn').innerHTML = "Old Expense Category";
            } else if(old_cust.style.display === "none" && new_cust.style.display === "block") {
                old_cust.style.display = "block";
                new_cust.style.display = "none";
                document.getElementById('customer_btn').innerHTML = "New Expense Category";
            }
            
        }


        function delete_func(){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.value) {
                    document.myform.submit();
                }
            })
        }


</script>