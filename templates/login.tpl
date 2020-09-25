{include file="header.tpl"}
<article class="container">
    <section class="row">
        <form action="iniciarSesion" method="post">
            <input type="text" class="form-control" name="user" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            <input type="password" class="form-control" name="pass" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
            <input type="submit" class="btn btn-primary" value="Login">
        </form>
    </section>
</article>
{include file="footer.tpl"}