import './bootstrap';
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm.js'
import {anchor} from "@alpinejs/anchor";
import autoResize from "./directives/auto-resize.js";

Alpine.plugin(anchor)
Alpine.directive('auto-resize', autoResize)

Livewire.start()
