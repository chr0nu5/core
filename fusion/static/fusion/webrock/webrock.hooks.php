<?php

/* =============================================
 * FusionCORE Hooks
 * 
 * Attach (or remove) multiple callbacks to an event and trigger those callbacks when that event is called.
 *
 * @param string $event name
 * @param mixed $value the optional value to pass to each callback
 * @param mixed $callback the method or function to call - FALSE to remove all callbacks for event
 * ============================================= */

function webrock_hook($event, $value = NULL, $callback = NULL) {
    static $events;

    // Adding or removing a callback?
    if ($callback !== NULL) {
        if ($callback) {
            $events[$event][] = $callback;
        } else {
            unset($events[$event]);
        }
    } elseif (isset($events[$event])) { // Fire a callback
        foreach ($events[$event] as $function) {
            $value = call_user_func($function, $value);
        }
        return $value;
    }
}
