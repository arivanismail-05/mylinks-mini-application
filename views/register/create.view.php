<?php require base_path('views/partials/head.php');?>
<?php require base_path('views/partials/nav.php');?>



<div class="flex my-8 flex-col justify-center px-6  lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Sign in to your account</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="/register" method="POST">


      <div>
        <label for="username" class="block text-sm/6 font-medium text-gray-900">Username</label>
        <div class="mt-2">
          <input type="username" name="username" id="username" autocomplete="username"  class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
        </div>
        <?php if(isset($errors['username'])): ?>

        <p id="filled_error_help" class="mt-2 text-italic text-xs text-red-600 dark:text-red-400 font-medium"><?= htmlspecialchars($errors['username'] )?></p>
        <?php endif ?>
      </div>


      <div>
        <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
        <div class="mt-2">
          <input type="email" name="email" id="email" autocomplete="email"  class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
        </div>
        <?php if(isset($errors['email'])): ?>

        <p id="filled_error_help" class="mt-2 text-italic text-xs text-red-600 dark:text-red-400 font-medium"><?= htmlspecialchars($errors['email'] )?></p>
        <?php endif ?>

      </div>


      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
        </div>
        <div class="mt-2">
          <input type="password" name="password" id="password" autocomplete="current-password"  class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
        </div>
        <?php if(isset($errors['password'])): ?>

        <p id="filled_error_help" class="mt-2 text-italic text-xs text-red-600 dark:text-red-400 font-medium"><?= htmlspecialchars($errors['password'] )?></p>
        <?php endif ?>

      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
      </div>
    </form>

  </div>
</div>

<?php require base_path('views/partials/foot.php');?>