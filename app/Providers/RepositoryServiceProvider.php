<?php

namespace Hifone\Providers;

use Hifone\Services\Repository\Repository;
use Hifone\Services\Repository\CommentRepository;
use Hifone\Services\Repository\DirRepository;
use Hifone\Services\Repository\ConfigRepository;
use Hifone\Services\Repository\ExpressionRepository;
use Hifone\Services\Repository\SourceRepository;
use Hifone\Services\Repository\SpaceDiggRepository;
use Hifone\Services\Repository\SpaceRepository;
use Hifone\Services\Repository\SystemDateRepository;
use Hifone\Services\Repository\UserDisableRepository;
use Hifone\Services\Repository\UserRepository;
use Hifone\Services\Repository\VoteRepository;
use Hifone\Services\Repository\BlogRepository;
use Hifone\Services\Repository\TaskRepository;
use Hifone\Services\Repository\PageRepository;
use Hifone\Services\Repository\ShareRepository;
use Hifone\Services\Repository\ThreadRepository;
use Hifone\Services\Repository\AllReplyRepository;
use Hifone\Services\Repository\ActivityRepository;
use Hifone\Services\Repository\CategoryTreeRepository;
use Hifone\Services\Repository\WallRepository;
use Hifone\Services\Repository\SmsRepository;
use Hifone\Services\Repository\PayRepository;
use Hifone\Services\FilesHandle\VideoService;
use Hifone\Services\FilesHandle\ImageService;
use Hifone\Services\FilesHandle\AttachService;
use Hifone\Services\FilesHandle\UploadFileService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Indicats if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

	protected $videoService;
    /**
     * Boot the repository provider.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the repository services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('repository', function ($app) {
            return new Repository($app);
        });
        $this->app->singleton('commentRepository', function () {
            return new CommentRepository();
        });
        $this->app->singleton('dirRepository', function () {
            return new DirRepository();
        });
        $this->app->singleton('expressionRepository', function () {
            return new ExpressionRepository();
        });
        $this->app->singleton('sourceRepository', function () {
            return new SourceRepository();
        });
        $this->app->singleton('spaceRepository', function () {
            return new SpaceRepository();
        });
        $this->app->singleton('spaceDiggRepository', function () {
            return new SpaceDiggRepository();
        });
        $this->app->singleton('systemDateRepository', function () {
            return new SystemDateRepository();
        });
        $this->app->singleton('userDisableRepository', function () {
            return new UserDisableRepository();
        });
        $this->app->singleton('userRepository', function () {
            return new UserRepository();
        });
        $this->app->singleton('shareRepository', function () {
            return new ShareRepository();
        });
        $this->app->singleton('videoService', function () {
            return new VideoService();
        });
        $this->app->singleton('imageService', function ($file,$folderName = '') {
            return new ImageService($file,$folderName);
        });
        $this->app->singleton('allReplyRepository', function () {
            return new AllReplyRepository();
        });
        $this->app->singleton('categoryTreeRepository', function () {
            return new CategoryTreeRepository();
        });
        $this->app->singleton('voteRepository', function () {
            return new VoteRepository();
        });
        $this->app->singleton('wallRepository', function () {
            return new WallRepository();
        });
        $this->app->singleton('threadRepository', function () {
            return new ThreadRepository();
        });
        $this->app->singleton('blogRepository', function () {
            return new BlogRepository();
        });
        $this->app->singleton('taskRepository', function () {
            return new TaskRepository();
        });
        $this->app->singleton('smsRepository', function () {
            return new SmsRepository();
        });
        $this->app->singleton('configRepository', function () {
            return new ConfigRepository();
        });
        $this->app->singleton('payRepository', function () {
            return new PayRepository();
        });
        $this->app->singleton('activityRepository', function () {
            return new ActivityRepository();
        });
        $this->app->singleton('attachService', function () {
            return new AttachService();
        });
         $this->app->singleton('pageRepository', function () {
            return new PageRepository();
        });
       
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'repository',
            'commentRepository',
            'dirRepository',
            'expressionRepository',
            'sourceRepository',
            'spaceRepository',
            'spaceDiggRepository',
            'systemDateRepository',
            'userDisableRepository',
            'userRepository',
            'shareRepository',
            'videoService',
            'imageService',
            'allReplyRepository',
            'categoryTreeRepository',
            'voteRepository',
            'wallRepository',
            'threadRepository',
            'blogRepository',
            'taskRepository',
            'smsRepository',
            'configRepository',
            'payRepository',
            'activityRepository',
            'attachService',
			'pageRepository',
        ];
        
    }
}
