import './bootstrap';
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm'
import {anchor} from "@alpinejs/anchor";
import autoResize from "./directives/auto-resize.js";
import {intersect} from "@alpinejs/intersect";

Alpine.plugin(anchor)
Alpine.plugin(intersect)
Alpine.directive('auto-resize', autoResize)

Livewire.start()
