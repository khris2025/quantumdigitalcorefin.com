<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Submit a Support Ticket</h5>
        </div>
        <div class="card-body">
            <div class="card p-4">
                <div class="card p-4">
                    <h4 class="mb-4 text-success">Submit a Support Ticket</h4>
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">

                            <!-- Ticket Priority -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-success" for="priority">Priority</label>
                                    <select class="form-control" id="priority" name="priority" required>
                                        <option value="" disabled selected>-- Choose Priority --</option>
                                        <option value="low">Low</option>
                                        <option value="medium">Medium</option>
                                        <option value="high">High</option>
                                        <option value="urgent">Urgent</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Subject -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-success" for="subject">Subject</label>
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter ticket subject" required>
                                </div>
                            </div>

                            <!-- Attachment -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label text-success" for="attachment">Attachment (optional)</label>
                                    <input type="file" class="form-control dropify" id="attachment" name="attachment" data-allowed-file-extensions="png jpg jpeg pdf doc docx">
                                </div>
                            </div>

                            <!-- Message -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label text-success" for="message">Message</label>
                                    <textarea class="form-control" id="message" name="message" rows="6" placeholder="Write your message here..." required></textarea>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-success w-100">Submit Ticket</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('client.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u318400810/domains/crystalglobalfin.com/public_html/B-dash/resources/views/client/support_ticket.blade.php ENDPATH**/ ?>