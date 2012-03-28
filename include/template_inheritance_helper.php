<?php
    /**
     * Django - like template inheritance emulation for PHP
     *
     * @author Daniel Dornhardt <daniel AT dornhardt.com>
     *
     * I liked djangos template inheritance - system, so I decided to create
     * something similar for PHP.
     *
     * It's not pretty, it's not well tested (yet), but from my intuition it should be
     * simple to use and pretty fast.
     *
     * @copyright Copyright (c) 2008 by Daniel Dornhardt
     * @license http://www.opensource.org/licenses/mit-license.php The MIT License
     *
     * Permission is hereby granted, free of charge, to any person
     * obtaining a copy of this software and associated documentation
     * files (the "Software"), to deal in the Software without
     * restriction, including without limitation the rights to use,
     * copy, modify, merge, publish, distribute, sublicense, and/or sell
     * copies of the Software, and to permit persons to whom the
     * Software is furnished to do so, subject to the following
     * conditions:
     *
     * The above copyright notice and this permission notice shall be
     * included in all copies or substantial portions of the Software.
     *
     * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
     * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
     * OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
     * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
     * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
     * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
     * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
     * OTHER DEALINGS IN THE SOFTWARE.
     *
     */

/*

CONFIGURATION:
If you are using Code Igniter, you shouldn't have to do anything. If not, you'll have to define a 'TI_VIEWS_DIR' constant, like define ('TI_VIEWS_DIR', 'views/'); which should be a path where PHP can find your view files. You can make it relative to the current PHP working dir or absolute, it shouldn't matter. If you don't do this, you'll have add the path to your files to your extend() calls. 
Then just include this file somehow. Cod Igniter users can drop it into their 'helpers' - dir and make sure that it gets loaded (via autoload or manually).
*/
    if (! defined('TI_VIEWS_DIR') ) {
        if (defined('APPPATH')) {
            define('TI_VIEWS_DIR', APPPATH.'views/');
        } else {
            define('TI_VIEWS_DIR', 'public_html/');
        }
    }
    
    define('TI_MARKER_EXTEND_BLOCK_HERE', '{{{[[[{[{[{[INSERT_BASE_DATA_HERE]}]}]}]]]}}}');

    /**
     * Gather output from extended templates
     *
     * array('blockname' => 'blockContent', ...)
     */
    $GLOBALS['TI_EXTENDED_BASE_TEMPLATE_DATA'] = array();

    /**
     * keep the name of the last marker
     */
    $GLOBALS['TI_CURRENT_BLOCKNAME'] = '';

    /**
     * keep the name of the file we are extending right now
     */
    $GLOBALS['TI_CURRENT_BASE_TEMPLATE'] = '';

    /**
     * Called to extend some parts of the base template $filename with content from this file
     *
     * @param string $filename - filename of the base template
     */
    function extend($filename) {
        $GLOBALS['TI_CURRENT_BASE_TEMPLATE'] = $filename;
    }

    /**
     * End the extension process for this file. Needs to be called after all blocks
     * have been set.
     *
     */
    function end_extend() {
        if (isset($GLOBALS['CI'])) {
            $GLOBALS['CI']->load->view($GLOBALS['TI_CURRENT_BASE_TEMPLATE']);
        }
        else {
            include realpath( TI_VIEWS_DIR . $GLOBALS['TI_CURRENT_BASE_TEMPLATE']);
        }
    }

    /**
     * Start a top-level block. Its contents can be replaced from within child templates.
     *
     * @param string $blockname
     */
    function start_block_marker($blockname) {
        // remember block name for end_block_marker()
        $GLOBALS['TI_CURRENT_BLOCKNAME'] = $blockname;
        // start caching this blocks output
        ob_start();
    }

    /**
     * End a top-level block. Its contents can be replaced from within child templates.
     *
     */
    function end_block_marker() {
        // get block content
        $thisBlocksContent = ob_get_clean();
        // check if we got data for this block from child templates
        if (array_key_exists($GLOBALS['TI_CURRENT_BLOCKNAME'], $GLOBALS['TI_EXTENDED_BASE_TEMPLATE_DATA'])) {
            // if yes, use that data instead of what's in this block
            // - except we got a marker that the child wants us to include this blocks content
            // in some places. If so, place our data into those spots.
            $thisBlocksContent = str_replace(
                TI_MARKER_EXTEND_BLOCK_HERE,
                $thisBlocksContent,
                $GLOBALS['TI_EXTENDED_BASE_TEMPLATE_DATA'][$GLOBALS['TI_CURRENT_BLOCKNAME']]
            );
        }
        // output result
        echo $thisBlocksContent;
    }


    /**
     * Mark the start of a block as content to be embedded into the base template.
     *
     * @param string $blockname
     */
    function startblock($blockname) {
        // remember block name for endblock()
        $GLOBALS['TI_CURRENT_BLOCKNAME'] = $blockname;
        // start caching this blocks output
        ob_start();
    }

    /**
     * Mark the end of a block as content to be embedded into the base template.
     */
    function endblock() {
        // get block content
        $thisBlocksContent = ob_get_clean();
        // check if we got data for this block from child templates
        if (array_key_exists($GLOBALS['TI_CURRENT_BLOCKNAME'], $GLOBALS['TI_EXTENDED_BASE_TEMPLATE_DATA'])) {
            // check if we got a marker that the child wants us to include this blocks content
            // in some places. If so, place our data into those spots.
            $thisBlocksContent = str_replace(
                TI_MARKER_EXTEND_BLOCK_HERE,
                $thisBlocksContent,
                $GLOBALS['TI_EXTENDED_BASE_TEMPLATE_DATA'][$GLOBALS['TI_CURRENT_BLOCKNAME']]
            );
        }
        // save this blocks content for use in templates higher up in the hierarchy
        $GLOBALS['TI_EXTENDED_BASE_TEMPLATE_DATA'][$GLOBALS['TI_CURRENT_BLOCKNAME']] = $thisBlocksContent;
    }

    /**
     * Insert a marker at this position to add the content from the base templates to this block.
     */
    function get_extended_block() {
        echo TI_MARKER_EXTEND_BLOCK_HERE;
    }

    /**
     * Check if this block's contents will be needed.
     * True if no child did override this block or a child needs this block's content
     *
     * @return bool
     */
    function block_rendering_neccessary() {
        // check if no child did override this block
        if (!array_key_exists($GLOBALS['TI_CURRENT_BLOCKNAME'], $GLOBALS['TI_EXTENDED_BASE_TEMPLATE_DATA'] )) {
            return true;
        }
        // check if there is an extension marker in the child blocks data. If so, the
        // rendering of this block is required
        if (false === strpos($GLOBALS['TI_EXTENDED_BASE_TEMPLATE_DATA'][$GLOBALS['TI_CURRENT_BLOCKNAME']], TI_MARKER_EXTEND_BLOCK_HERE)) {
            return false;
        } else {
            return true;
        }
    }
?>