<?php $__env->startSection('content'); ?>
    <h1 class="mb-10 text-2xl">Books</h1>

    <form method="GET" action="<?php echo e(route('books.index')); ?>" class="mb-4 flex items-center space-x-2">
        <input type="text" name="name" placeholder="Search by name"
            value="<?php echo e(request('name')); ?>" class="input h-10"/>
        <input type="hidden" name="filter" value="<?php echo e(request('filter')); ?>"/>
        <button type="submit" class="btn h-10">Search</button>
        <a href="<?php echo e(route('books.index')); ?>" class="btn h-10">Clear</a>
    </form>

    <div class="filter-conteiner mb-4 flex">
        <?php
        $filters = [
            '' => 'Latest',
            'popular_last_month'=> 'Pupular Last Month',
            'popular_last_6months'=> 'Pupular Last 6 Months',
            'highest_rated_last_month'=> 'Highest Rated Last Month',
            'highest_rated_last_6months'=> 'Highest Rated Last 6 Months'
        ];
        ?>

        <?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('books.index', [...request()->query(), 'filter' => $key])); ?>"
              class="<?php echo e(request('filter') === $key || (request('filter') === null && $key === '') ? 'filter-item-active' : 'filter-item'); ?>">
                <?php echo e($label); ?>

            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <ul>
        <?php $__empty_1 = true; $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <li class="mb-4">
            <div class="book-item">
                <div
                class="flex flex-wrap items-center justify-between">
                <div class="w-full flex-grow sm:w-auto">
                    <a href="<?php echo e(route ('books.show', $book)); ?>" class="book-title"><?php echo e($book->name); ?></a>
                    <span class="book-author">by <?php echo e($book->author); ?></span>
                </div>
                <div>
                    <div class="book-rating">
                    <?php echo e(number_format($book->reviews_avg_rating, 1)); ?>

                    </div>
                    <div class="book-review-count">
                    out of <?php echo e($book->reviews_count); ?> <?php echo e(Str::plural('review', $book->reviews_count)); ?>

                    </div>
                </div>
                </div>
            </div>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <li class="mb-4">
                <div class="empty-book-item">
                <p class="empty-text">No books found</p>
                <a href="<?php echo e(route('books.index')); ?>" class="reset-link">Reset criteria</a>
                </div>
            </li>
        <?php endif; ?>
    </ul>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Documents\php\book-review\resources\views/books/index.blade.php ENDPATH**/ ?>