<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerX0kBffy\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerX0kBffy/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerX0kBffy.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerX0kBffy\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerX0kBffy\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'X0kBffy',
    'container.build_id' => '008a8e50',
    'container.build_time' => 1645409890,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerX0kBffy');