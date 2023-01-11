<template>


    <form method="post" style="width: 400px; margin: auto; font-size: 30px">
        <h1 class="text-center">{{ title }}</h1>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" v-model="l_email">

        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" v-model="password">
        </div>
        <div class="text-center" >
            <button type="submit" class="btn btn-primary" style="width: 200px !important;">Login</button>
        </div>

    </form>

</template>
<script>
export default {
    setup: () => ({
        title: 'LOGIN'

    })
}
</script>
