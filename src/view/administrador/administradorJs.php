<script>
    var adm = ({
        carregar(page) {
            $.ajax({
                'url': '/src/controller/' + page + 'Controller.php?action=read'
            }).done((data) => {
                $('#contentAdm').html(data);
            })
            if (document.body.classList.contains('sidenav-toggled')) {
                document.body.classList.toggle('sidenav-toggled');
                localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sidenav-toggled'));
            }
        },
        novo(page) {
            $.ajax({
                'url': '/src/controller/' + page + 'Controller.php?action=new'
            }).done((data) => {
                $('#contentAdm').html(data);
            })
        },
        update(url, cod) {
            $.ajax({
                'url': url,
                'method': 'post',
                'data': {
                    'action': 'new',
                    'cod': cod
                }
            }).done((data) => {
                $('#contentAdm').html(data);
            })
        },
        delete(url, cod) {
            $.ajax({
                'url': url,
                'method': 'post',
                'data': {
                    'action': 'delete',
                    'cod': cod
                }
            }).done((data) => {
                $('#contentAdm').html(data);
            })
        },
        calendar(page) {
            $.ajax({
                'url': '/src/controller/' + page + 'Controller.php?action=calendar'
            }).done((data) => {
                $('#contentAdm').html(data);
            })
        }
    })
</script>