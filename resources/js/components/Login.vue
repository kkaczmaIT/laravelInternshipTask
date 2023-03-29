<template>
            <div>
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div>
                <label for="password" class="form-label">Hasło</label>
                <input type="password" class="form-control" name="password">
            </div> 
            <button type="submit" class="btn btn-primary mt-4">Zaloguj się</button>
    
</template>

<script>
    export default {
        mounted() {
            console.log('Login Form mounted.')
        }
    }
</script>
