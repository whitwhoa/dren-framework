<?php

/* NOTES:
 * > post routes ALWAYS block
 * > get routes only block at the beginning of the request IF a session token is provided in order to update the meta
 *      data of that session, afterward they immediately release the lock and the request continues
 * > adding "->block()" to a get route will force said get route to block as if it were a post request
 *
 * WHAT DOES THIS MEAN:
 * > You CANNOT modify session state in a non-blocking get request, doing so will result in lost data as anything you
 *      attempt to write to the session will be ignored at the end of the script
 * > No scripts can start (for the same client) during the execution of a blocking request
 *      > This is because...well I guess that's not entirely true, because if it's the first attempt at a blocking
 *          route, and user has no session token, we would have to block on ip so if we're blocking on ip, and user
 *          requests another route concurrently that's non-blocking, THAT would run concurrently, but it wouldn't
 *          be modifying any state...
 *
 */

